<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Customer;
use App\OrderDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendConfirmEmail(){
        Mail::queue('mails.registry_confirm', ['Name' => session()->get('NameTemp'),'ConfirmCode' => session()->get('_token')], function ($m) {
            $m->to(session()->get('EmailTemp'), session()->get('NameTemp'))->subject('Kích Hoạt Tài Khoản ShopOnline Của Bạn');
        });
        return redirect()->route('customer.creation_successful');
    }
    public function getResendConfirmEmail(){
        return view('pages.customer.resend_confirm_code');
    }
    public function postResendConfirmEmail(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:100',
        ], [
            'email.required'        => 'Bạn chưa nhập Email',
            'email.email'           => 'Định dạng Email không hợp lệ',
            'email.max'             => 'Email chứa tối đa 100 ký tự',
        ]);
        $Customer = Customer::select('CustomerFullName','Email','Status','remember_token')->get();
        $match_info = false;
        $match_email = false;
        foreach($Customer as $item){
            if($item['Email'] == $request->email){
                $match_email = true;
                if($item['Status'] == 0 && $item['remember_token'] != null){
                    Mail::queue('mails.registry_confirm', ['Name' => $item['CustomerFullName'],'ConfirmCode' => $item['remember_token']], function ($m) use($item) {
                        $m->to($item['Email'], $item['CustomerFullName'])->subject('Kích Hoạt Tài Khoản ShopOnline Của Bạn');
                    });
                    $match_info = true;
                }
            }
        }
        if($match_info == false && $match_email == true){
            return redirect()->back()->with('flash_message_account_activated','Tài khoản này đã được kích hoạt! Nếu bạn không đăng nhập được hãy liên hệ với Customer Support.');
        }elseif($match_email == false){
            return redirect()->back()->with('flash_message_warning','Email này chưa được dùng để đăng ký!');
        } else{
            return redirect()->back()->with('flash_message_success','Đã gởi Email thành công! Vui lòng kiểm tra hộp thư để kích hoạt tài khoản của bạn');
        }

    }

    public function authenticateConfirmCode($code){
        $Customer = Customer::select('CustomerId','remember_token')->get();
        $match = false;
        foreach($Customer as $item){
            if($code == $item['remember_token']){
                Customer::where('CustomerId',$item['CustomerId'])->update(['Status' => 1]);
                Customer::where('CustomerId',$item['CustomerId'])->update(['remember_token' => null]);
                $match = true;
            }
        }
        if($match == false){
            return redirect()->route('customer.getLogin')->with('flash_message_account_activated','Tài Khoản này đã được kích hoạt, hãy đăng nhập để mua hàng ngay bây giờ!');
        }else{
            return redirect()->route('customer.getConfirmSuccess');
        }
    }

    //********************************* ORDER MAIL ******************************************
    public function sendOrderSuccessEMail($id){
        $OrderDetail = OrderDetail::getOrderDetail($id);
        $Email = $OrderDetail['Customer']->Email;
        $Name = $OrderDetail['Customer']->CustomerFullName;
        //dd($OrderDetail['Customer']->Email);
        Mail::queue('mails.order_success', [
            'Email' => $OrderDetail['Customer']->Email,
            'CustomerFullName' => $OrderDetail['Customer']->CustomerFullName,
            'OrderId' => $OrderDetail['Order']->OrderId,
            'FullName' => $OrderDetail['Order']->FullName,
            'Address' => $OrderDetail['Order']->Address,
            'Phone' => $OrderDetail['Order']->Phone,
            'TotalPrice' => $OrderDetail['Order']->TotalPrice,
            'PaymentMethodName' => $OrderDetail['PaymentMethod']->PaymentMethodName,
            'orderDetail' => $OrderDetail['Product'],
        ], function ($m) use ($Email,$Name){
            $m->to($Email,$Name)->subject('Thanh toán đơn hàng thành công');
        });
        $notification = session()->pull('notification');
        return view('pages.customer.payment_success', compact('notification'));
    }


    //********************************* CONTACT MAIL ******************************************
    public function sendReplyContactEmail($id){
        $Contact = Contact::findOrFail($id);
        Mail::queue('mails.contact_email', [
            'ContactName'      => $Contact->ContactName,
            'Email'     => $Contact->Email,
            'Content'   => $Contact->Content,
            'Reply'     => $Contact->ReplyContent,
            'Title'     => $Contact->Title,
        ], function ($m) use ($Contact){
            $m->to($Contact->Email, $Contact->ContactName)->subject('Thư Trả Lời Liên Hệ');
        });
        return redirect()->route('contact.list')->with('flash_message','ĐÃ GỞI EMAIL THÀNH CÔNG');
    }
}
