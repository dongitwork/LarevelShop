<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Requests;
use App\Order;
use App\OrderDetail;
use App\OrderStatus;
use App\PaymentMethod;
use App\Product;
use App\Province;
use App\District;
use App\TransactionDetail;
use App\Ward;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

define('URL_API','https://www.nganluong.vn/checkout.api.nganluong.post.php'); // Đường dẫn gọi api
define('RECEIVER','lyna31093@gmail.com'); // Email tài khoản ngân lượng
define('MERCHANT_ID', '46230'); // Mã merchant kết nối
define('MERCHANT_PASS', '5f8044540e3fcb05c930a0b0569a99aa'); // Mật khẩu kết nôi
define('VERSION', '3.1');
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
$uri .= $_SERVER['HTTP_HOST'];
define('RETURN_URL', $uri.'/payment_success');
define('CANCEL_URL', $uri.'/cancel/');
class PaymentController extends Controller
{   //Xử lý khi khách bấm vào hủy đơn hàng trong ngân lượng
    public function getCancelURL($order_id){
        if(session()->has('cancelled') and session('cancel_url') == url()->current()){
            return redirect()->route('home');
        }else{
            if(isset($order_id)){
                //Thay đổi trạng thái đơn hàng đã tạo thành Cancelled:
                $order_status = new OrderStatus();
                $order_status->OrderId = $order_id;
                $order_status->StatusId = 5;
                $order_status->save();
                //Backup lại số lượng hàng đã trừ:
                $product_backup = DB::table('order_detail')
                    ->join('product_publish','order_detail.ProductPublishId','=','product_publish.ProductPublishId')
                    ->join('product','product.ProductId','=','product_publish.ProductId')
                    ->select('product.ProductId','product.QuantityBackUp')->where('order_detail.OrderId',$order_id)->get();

                foreach ($product_backup as $item) {
                    $product = Product::findOrFail($item->ProductId);
                    $product->Quantity = $item->QuantityBackUp;
                    $product->save();
                }
                //thêm trạng thái vào session khi đã cancel đơn hàng là true thì ko thực hiện 1 lần nữa khi có người truy cập theo link đó
                session(['cancelled' => 'true','cancel_url' => url()->current()]);
                return redirect()->to('/')->with('flash_message','BẠN ĐÃ HỦY THANH TOÁN ĐƠN HÀNG THÀNH CÔNG');
            }else{
                return view('errors.503');
            }
        }
    }
    public function getPaymentDeliver()
    {
        return view('pages.customer.payment_deliver');
    }
    public function getPaymentSuccess(){
        $nl_result = $this->GetTransactionDetail($_GET['token']);
        $notification ='';
        if($nl_result){
            $nl_errorcode           = (string)$nl_result->error_code;
            $nl_transaction_status  = (string)$nl_result->transaction_status;
            $orderId = substr($nl_result->order_code,0,-10);
            if($nl_errorcode == '00') {
                if($nl_transaction_status == '00') {
                    //trạng thái thanh toán thành công
                    $notification = "Thanh toán đơn hàng thành công";
                }
            }else{
                $notification = $this->GetErrorMessage($nl_errorcode);
            }
            // LƯU VÀO TABLE TRANSACTION DETAIL
            $trans_detail = new TransactionDetail();
            $trans_detail->ErrorCode = (string)$nl_result->error_code;
            $trans_detail->Token = (string)$nl_result->token;
            $trans_detail->Description = (string)$nl_result->description;
            $trans_detail->TransactionStatus = (string)$nl_result->transaction_status;
            $trans_detail->ReceiverEmail = (string)$nl_result->receiver_email;
            $trans_detail->OrderCode = (string)$nl_result->order_code;
            $trans_detail->TotalAmount = (double)$nl_result->total_amount;
            $trans_detail->PaymentMethod = (string)$nl_result->payment_method;
            $trans_detail->BankCode = (string)$nl_result->bank_code;
            $trans_detail->PaymentType = (string)$nl_result->payment_type;
            $trans_detail->OrderDescription = (string)$nl_result->order_description;
            $trans_detail->TaxAmount = (double)$nl_result->tax_amount;
            $trans_detail->DiscountAmount = (double)$nl_result->discount_amount;
            $trans_detail->FeeShipping = (double)$nl_result->fee_shipping;
            $trans_detail->ReturnUrl = (string)$nl_result->return_url;
            $trans_detail->CancelUrl = (string)$nl_result->cancel_url;
            $trans_detail->BuyerFullname = (string)$nl_result->buyer_fullname;
            $trans_detail->BuyerEmail = (string)$nl_result->buyer_email;
            $trans_detail->BuyerMobile = (string)$nl_result->buyer_mobile;
            $trans_detail->BuyerAddress = (string)$nl_result->buyer_address;
            $trans_detail->AffiliateCode = (string)$nl_result->affiliate_code;
            $trans_detail->TransactionId = (string)$nl_result->transaction_id;
            $trans_detail->OrderId = substr($nl_result->order_code,0,-10);
            $trans_detail->save();

            if((string)$nl_result->transaction_status == '00'){
                //thanh toán thành công => chuyển trạng thái Ready To Ship.
                $status = new OrderStatus();
                $status->OrderId = substr($nl_result->order_code,0,-10);
                $status->StatusId = 2;
                $status->save();
            }
            session()->put('notification',$notification);
            return redirect()->route('mail.sendOrderSuccessEMail',$orderId);
        }
    }

    public function getPayment(){
        if(auth('customer')->check()){
            $Province = Province::select('ProvinceId', 'ProvinceName')->get();
            $PaymentMethod = PaymentMethod::all();
            //dd($location['Province']);
            return view('pages.customer.payment', compact('Province','PaymentMethod'));
        }else{
            return redirect()->back()->with('flash_message_warning','BẠN HÃY ĐĂNG NHẬP ĐỂ THANH TOÁN GIỎ HÀNG');
        }
        
    }

    public function getDistrict($id){
        $Province = Province::findOrFail($id);
        $District = $Province->district;
        return $District;
    }

    public function getWard($id){
        $District   = District::findOrFail($id);
        $Ward       = $District->ward;
        return $Ward;
    }
    //************************************ LƯU THÔNG TIN VÀO ORDER TABLE & ORDER_DETAIL TABLE & ORDER_STATUS TABLE ************************************
    public function postPayment(PaymentRequest $request){
        $provinceName = Province::select('ProvinceName')->where('ProvinceId', $request->province)->first();
        $districtName = District::select('DistrictName')->where('Districtid', $request->district)->first();
        $wardName = Ward::select('WardName')->where('WardId', $request->ward)->first();
        $address = $request->address.' - '.$wardName['WardName'].' - '.$districtName['DistrictName'].' - '.$provinceName['ProvinceName'];
        //dd($address);
        //Trừ tạm thời số lượng sản phẩm đã mua.
        foreach(session()->get('Product') as $item){
            $Product = Product::findOrFail($item['ProductId']);
            $Product->Quantity = $Product->Quantity - $item['QuantityPurchased'];
            $Product->save();
        }

        //Thêm trong Order Table
        if($request->radioCheckout == '1'){
            $order = new Order();
            $order->CreatedAt = Carbon::now()->setTimezone('ICT')->toDateTimeString();
            $order->DeliverDate = Carbon::now()->setTimezone('ICT')->addDays(4)->toDateString();
            $order->FullName = $request->name;
            $order->Address = $address;
            $order->Phone = $request->phone;
            $order->TotalPrice = session()->get('TotalPrice');
            $order->PriceDeliver = 0;
            $order->CustomerId = auth()->guard('customer')->user()->CustomerId;
            $order->PaymentMethodId = $request->radioCheckout;
            $order->WardId = $request->ward;
            $order->save();
            //THÊM ĐIỀU KIỆN CHECK SỐ LƯỢNG HÀNG HÓA

            //code lấy ra order id mới nhất trong database theo customer id
            $currentOrderId = Order::select('OrderId')->where('CustomerId',auth()->guard('customer')->user()->CustomerId)->orderBy('OrderId','desc')->first();
            //Thêm trong Order_Detail Table
            foreach(session()->get('Product') as $item){
                $order_detail = new OrderDetail();
                $order_detail->Quantity = $item['QuantityPurchased'];
                $order_detail->TotalPrice = $item['QuantityPurchased'] * $item['PriceWithoutFormat'];
                $order_detail->OrderId = $currentOrderId['OrderId'];
                $order_detail->ProductPublishId = $item['ProductPublishId'];
                $order_detail->save();
            }

            //Thêm trong Order_Status Table
            $order_status = new OrderStatus();
            $order_status->OrderId = $currentOrderId['OrderId'];
            $order_status->StatusId = 1; //ID của trạng thái đầu tiên Pending
            $order_status->DateModified = Carbon::now()->setTimezone('ICT')->toDateTimeString();
            $order_status->save();


            //********************************************* NGÂN LƯỢNG CODE *********************************************

            $total_amount=session()->get('TotalPrice');

            /*$array_items[0]= array('item_name1' => 'Product name',
                            'item_quantity1' => 1,
                            'item_amount1' => $total_amount,
                            'item_url1' => 'http://nganluong.vn/');*/
            $array_items = array();
            foreach (session()->get('Product') as $key => $item) {
                $array_items[$key] = [
                    'item_name'     => $item['ProductName'],
                    'item_quantity' => $item['QuantityPurchased'],
                    'item_amount'   => $item['PriceWithoutFormat']*$item['QuantityPurchased'],
                    'item_url'      => $item['ProductURL'],
                ];
            }

            //$payment_method ='NL';
            //$bank_code = @$_POST['bankcode'];
            $order_code =$currentOrderId['OrderId'].time();
            $payment_type ='';
            $discount_amount =0;
            $order_description='';
            $tax_amount=0;
            $fee_shipping=0;
            $return_url = RETURN_URL;
            $cancel_url =urlencode(CANCEL_URL.$currentOrderId['OrderId']) ;

            $buyer_fullname = $request->name;
            $buyer_email = auth()->guard('customer')->user()->Email;
            $buyer_mobile =$request->phone;
            $buyer_address = $address;

            $nl_result= $this->NLCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
                                                $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                                                $buyer_address,$array_items);
            if ($nl_result->error_code =='00'){
                //&&&&&&&&&&&&&&&&&&&&&&&&&&& XÓA GIỎ HÀNG SAU KHI ĐÃ BẤM THANH TOÁN VÀ CHUYỂN QUA TRANG NGÂN LƯỢNG &&&&&&&&&&&&&&&&&&

                session()->forget('Product');
                session()->forget('TotalPrice');

                //&&&&&&&&&&&&&&&&&&&&&&&&&&& XÓA GIỎ HÀNG SAU KHI ĐÃ BẤM THANH TOÁN VÀ CHUYỂN QUA TRANG NGÂN LƯỢNG &&&&&&&&&&&&&&&&&&
                return redirect($nl_result->checkout_url);
            }else{
                echo $nl_result->error_message;
            }
        }
        else{
            return view('errors.UnderContruction_Error');
        }
    }

    public function NLCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,$fee_shipping,
                               $discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                               $buyer_address,$array_items){

        $cur_code = 'vnd';
        //$version ='3.1';

        $params = array(
            'cur_code'				=> $cur_code,
            'function'				=> 'SetExpressCheckout',
            'version'				=> VERSION,
            'merchant_id'			=> MERCHANT_ID, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email'		=> RECEIVER,
            'merchant_password'		=> MD5(MERCHANT_PASS), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code'			=> $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount'			=> $total_amount, //Tổng số tiền của hóa đơn
            'payment_method'		=> 'NL', //Phương thức thanh toán
            'payment_type'			=> $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description'		=> $order_description, //Mô tả đơn hàng
            'tax_amount'			=> $tax_amount, //Tổng số tiền thuế
            'fee_shipping'			=> $fee_shipping, //Phí vận chuyển
            'discount_amount'		=> $discount_amount, //Số tiền giảm giá
            'return_url'			=> $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url'			=> $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname'		=> $buyer_fullname, //Tên người mua hàng
            'buyer_email'			=> $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile'			=> $buyer_mobile, //Điện thoại người mua
            'buyer_address'			=> $buyer_address, //Địa chỉ người mua hàng
            'total_item'			=> count($array_items) //Tổng số sản phẩm trong đơn hàng
        );
        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        if(count($array_items)>0){
            foreach($array_items as $array_item){
                foreach ($array_item as $key => $value){
                    if ($post_field != '') $post_field .= '&';
                    $post_field .= $key."=".$value;
                }
            }
        }

        $nl_result = $this->CheckoutCall($post_field);
        return $nl_result;
    }

    public function CheckoutCall($post_field){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, URL_API);
        curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        $nl_result = "";
        if ($result != '' && $status == 200){
            $xml_result = str_replace('&','&amp;',(string)$result);
            $nl_result  = simplexml_load_string($xml_result);
            $nl_result->error_message = $this->GetErrorMessage($nl_result->error_code);
        }
        else $nl_result->error_message = $error;
        return $nl_result;
    }

    public function GetTransactionDetail($token){
        $params = array(
            'merchant_id'       => MERCHANT_ID ,
            'merchant_password' => MD5(MERCHANT_PASS),
            'version'           => VERSION,
            'function'          => 'GetTransactionDetail',
            'token'             => $token
        );

        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,URL_API);
        curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        if ($result != '' && $status==200){
            $nl_result = simplexml_load_string($result);
            return $nl_result;
        }

        return false;
    }

    public function GetErrorMessage($error_code){
        $arrCode = array(
            '00' => 'Thành công',
            '99' => 'Lỗi chưa xác minh',
            '06' => 'Mã merchant không tồn tại hoặc bị khóa',
            '02' => 'Địa chỉ IP truy cập bị từ chối',
            '03' => 'Mã checksum không chính xác, truy cập bị từ chối',
            '04' => 'Tên hàm API do merchant gọi tới không hợp lệ (không tồn tại)',
            '05' => 'Sai version của API',
            '07' => 'Sai mật khẩu của merchant',
            '08' => 'Địa chỉ email tài khoản nhận tiền không tồn tại',
            '09' => 'Tài khoản nhận tiền đang bị phong tỏa giao dịch',
            '10' => 'Mã đơn hàng không hợp lệ',
            '11' => 'Số tiền giao dịch lớn hơn hoặc nhỏ hơn quy định',
            '12' => 'Loại tiền tệ không hợp lệ',
            '29' => 'Token không tồn tại',
            '80' => 'Không thêm được đơn hàng',
            '81' => 'Đơn hàng chưa được thanh toán',
            '110' => 'Địa chỉ email tài khoản nhận tiền không phải email chính',
            '111' => 'Tài khoản nhận tiền đang bị khóa',
            '113' => 'Tài khoản nhận tiền chưa cấu hình là người bán nội dung số',
            '114' => 'Giao dịch đang thực hiện, chưa kết thúc',
            '115' => 'Giao dịch bị hủy',
            '118' => 'tax_amount không hợp lệ',
            '119' => 'discount_amount không hợp lệ',
            '120' => 'fee_shipping không hợp lệ',
            '121' => 'return_url không hợp lệ',
            '122' => 'cancel_url không hợp lệ',
            '123' => 'items không hợp lệ',
            '124' => 'transaction_info không hợp lệ',
            '125' => 'quantity không hợp lệ',
            '126' => 'order_description không hợp lệ',
            '127' => 'affiliate_code không hợp lệ',
            '128' => 'time_limit không hợp lệ',
            '129' => 'buyer_fullname không hợp lệ',
            '130' => 'buyer_email không hợp lệ',
            '131' => 'buyer_mobile không hợp lệ',
            '132' => 'buyer_address không hợp lệ',
            '133' => 'total_item không hợp lệ',
            '134' => 'payment_method, bank_code không hợp lệ',
            '135' => 'Lỗi kết nối tới hệ thống ngân hàng',
            '140' => 'Đơn hàng không hỗ trợ thanh toán trả góp',);

        return $arrCode[(string)$error_code];
    }
}
