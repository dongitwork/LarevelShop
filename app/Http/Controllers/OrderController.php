<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\OrderStatus;
use App\Shipper;
use App\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
	public function getListOrder(){
        $listorder = Order::getListOrder();
        return view('admin.pages.order.list_order', compact('listorder'));
    }

    //Lấy order detail bỏ vào view "order_detail"
    public function getOrderDetail($id){
        $orderDetail = OrderDetail::getOrderDetail($id);
        $orderStatus = OrderStatus::getOrderStatus($id);
        $orderShipperId = OrderStatus::getShipperId($id);
        $statusList = Status::all();
        $shipperList = Shipper::all();
        return view('admin.pages.order.order_detail', compact('orderDetail','statusList','orderStatus','shipperList','orderShipperId'));
    }
    //Cập nhật trạng thái order trong "order_status"
    public function postOrderDetail(Request $request, $id){
        $OrderStatus = DB::table('order_status')->select('StatusId')->where('OrderId', $id)->orderBy('OrderStatusId','desc')->first();
        if($OrderStatus->StatusId == 4){
            return redirect()->back()->with('flash_message_warning','ĐƠN HÀNG ĐÃ ĐƯỢC CHUYỂN CHO KHÁCH HÀNG THÀNH CÔNG, BẠN KHÔNG THỂ THAY ĐỔI TRẠNG THÁI');
        }elseif($OrderStatus->StatusId == 5){
            return redirect()->back()->with('flash_message_warning','ĐƠN HÀNG ĐÃ BỊ HỦY, BẠN KHÔNG THỂ THAY ĐỔI TRẠNG THÁI');
        }else{
            $order_status = new OrderStatus();
            $order_status->OrderId = $id;
            $order_status->StatusId = $request->order_status;
            $order_status->UserId = auth()->guard('admin')->user()->UserId;
            if($request->shipper == ""){
                $order_status->ShipperId = null;
            }else{
                $order_status->ShipperId = $request->shipper;
            }
            $order_status->DateModified = Carbon::now()->setTimezone('ICT')->toDateTimeString();
            $order_status->save();
            return redirect()->route('order.list')->with('flash_message','TRẠNG THÁI ĐƠN HÀNG ĐÃ ĐƯỢC CẬP NHẬT THÀNH CÔNG');
        }
    }
}