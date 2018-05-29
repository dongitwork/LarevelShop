<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\ChangePassRequest;
use App\Http\Requests\CustomerEditRequest;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Reply;
use Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function getCreationSuccessfull(){
        return view('pages.customer.creation_successful');
    }

    public function getCreation(){
        return view('pages.customer.creation');
    }

    public function getCustomerSetting(){
        return view('pages.customer.customer_setting');
    }

    public function postCustomerSetting(CustomerEditRequest $requests){
        $customer = Customer::findOrFail(auth('customer')->user()->CustomerId);
        $customer->CustomerFullName = $requests->name;
        $customer->Birthday = $requests->birthday;
        $customer->Phone = $requests->phone;
        $customer->Address = $requests->address;

        if($requests->hasFile('image')) {
            $file = Input::file('image');
            $Image = 'Customer_'.auth('customer')->user()->CustomerId.'_Avatar.'.$file->getClientOriginalExtension();
            $customer->Image = '/img/customer/'.$Image;
            $file->move(public_path().'/img/customer/', $Image);
        }
        $customer->save();
        return redirect()->back()->with('flash_message','CẬP NHẬT THÔNG TIN THÀNH CÔNG');
    }
    //lấy thông tin các order đã tạo của khách hàng
    public function getOrderHistory(){
        $OrderId = Order::select('OrderId')->where('CustomerId',auth('customer')->user()->CustomerId)->orderBy('OrderId','desc')->get();
        foreach($OrderId as $key => $item){
            $OrderHistory[$key] = OrderDetail::getOrderHistoryForCustomer($item->OrderId);
        }
        return view('pages.customer.order_history',compact('OrderHistory'));
    }

    public function getOrderDetail($id){
        $OrderDetail = OrderDetail::getOrderDetail($id);
        $Status = DB::table('order_status')->join('status','status.StatusId','=','order_status.StatusId')
                    ->where('order_status.OrderId',$id)->select('status.StatusName','status.StatusIcon')
                    ->orderBy('order_status.OrderStatusId','desc')->first();
        //dd($OrderDetail);
        return view('pages.customer.order_detail', compact('OrderDetail','Status'));
    }

    public function getChangedPass(){
        return view('pages.customer.changed_pass');
    }
    public function postChangedPass(ChangePassRequest $request){
        $old_pass = auth('customer')->user()->Password;
        if (Hash::check($request->old_pass, $old_pass)) {
            $customer = Customer::findOrFail(auth('customer')->user()->CustomerId);
            $customer->Password = Hash::make($request->new_pass);
            $customer->save();
            return redirect()->back()->with('flash_message','ĐỔI PASSWORD THÀNH CÔNG');
        }else{
            return redirect()->back()->with('flash_message_danger','MẬT KHẨU CŨ KHÔNG TRÙNG KHỚP,VUI LÒNG NHẬP LẠI MẬT KHẨU');
        }
    }

    public function postCreation(CustomerRequest $request){
        session()->put('NameTemp',$request->fullname);
        session()->put('EmailTemp',$request->email);
        $customer = new Customer();
        $customer->CustomerFullName = $request->fullname;
        $customer->Email            = $request->email;
        $customer->Password         = Hash::make($request->password);
        $customer->Gender           = $request->gender;
        $customer->Status           = 0;
        $customer->remember_token   = session()->get('_token');
        $customer->save();
        return redirect()->route('mail.getSendConfirmCode');
    }

    public function getConfirmSuccess(){
        return view('pages.customer.confirm_successful');
    }

    public function getListCustomer(){

    }


    public function getEditCustomer(){

    }

    public function postEditCustomer(){

    }

    /************************************ ADMIN COMMENT MANAGER AREA ************************************/

    public function getListComment(){
        $CommentInfo = Comment::getCommentInfoAdmin();
        return view('admin.pages.comment.listcomment',compact('CommentInfo'));
    }
    public function getEditComment($id){
        $CommentInfo = Comment::getCommentInfoById($id);
        return view('admin.pages.comment.editcomment',compact('CommentInfo'));
    }
    public function postEditComment(Request $request,$id){
        $comment = Comment::findOrFail($id);
        $comment->Status = $request->status;
        $comment->UpdatedAt = Carbon::now()->setTimezone('ICT')->toDateTimeString();
        $comment->save();
        if($request->reply != null){
            if($request->no_reply_before == "yes"){
                $reply = new Reply();
                $reply->Content = $request->reply;
                $reply->CreatedAt = Carbon::now()->setTimezone('ICT')->toDateTimeString();
            }else{
                $reply = Comment::find($id)->reply;
                $reply->Content = $request->reply;
                $reply->UpdatedAt = Carbon::now()->setTimezone('ICT')->toDateTimeString();
            }
            $reply->CommentId = $id;
            $reply->UserId = auth()->guard('admin')->user()->UserId;
            $reply->save();
        }
        return redirect()->route('comment.list')->with('flash_message','CẬP NHẬT THÀNH CÔNG');
    }


}
