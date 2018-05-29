<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'OrderId';
    public $timestamps = false;
    protected $fillable = [
        'CreatedAt', 'DeliverDate', 'Address', 'TotalPrice', 'PriceDeliver', 'CustomerId', 'PaymentMethodId', 'UserId', 'WardId',
    ];

    public static function getListOrder(){
        $order = DB::table('order')
                    ->join('payment_method', 'order.PaymentMethodId', '=', 'payment_method.PaymentMethodId')
                    ->select('order.OrderId', 'order.CreatedAt', 'order.FullName', 'order.TotalPrice',
                             'order.PriceDeliver', 'payment_method.PaymentMethodName')
                    ->orderBy('order.OrderId', 'desc')->get();

        foreach($order as $key => $item){
            $statusId = DB::table('order_status')->select('StatusId')->where('OrderId', $item->OrderId)->orderBy('OrderStatusId','desc')->first();
            $status = DB::table('status')->select('StatusName','StatusIcon')->where('StatusId', $statusId->StatusId)->first();
            $order[$key]->OrderStatusName = $status->StatusName;
            $order[$key]->OrderStatusIcon = $status->StatusIcon;
        }
        return $order;
    }
}

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'OrderDetailId';
    public $timestamps = false;
    protected $fillable = [
        'Quantity', 'TotalPrice', 'Sale', 'OrderId', 'ProductPublishId',
    ];

    public static function getOrderDetail($id){
        $orderDetail['Order'] = DB::table('order')->select('*')
                                    ->where('OrderId',$id)->first();
        $orderDetail['PaymentMethod'] = DB::table('payment_method')->select('PaymentMethodName')
                                    ->where('PaymentMethodId', $orderDetail['Order']->PaymentMethodId)->first();

        $orderDetail['Customer'] = DB::table('customer')
                                    ->select('CustomerFullName', 'Address', 'Email', 'Phone')
                                    ->where('CustomerId',$orderDetail['Order']->CustomerId)->first();

        $ProductPublish = DB::table('order_detail')
                                        ->select('ProductPublishId', 'Quantity', 'TotalPrice')
                                        ->where('OrderId',$id)->get();
        foreach($ProductPublish as $item){
            $ProductId[] = DB::table('product_publish')->select('ProductId')
                                        ->where('ProductPublishId',$item->ProductPublishId)->first();
        }
        foreach($ProductId as $item){
            $Product[] = DB::table('product')->select('ProductName')
                                                    ->where('ProductId',$item->ProductId)->first();
        }

        for($i = 0; $i < count($ProductPublish); $i++){
            $orderDetail['Product'][] = collect(['ProductName' => $Product[$i]->ProductName,'Quantity' => $ProductPublish[$i]->Quantity,'TotalPrice' => $ProductPublish[$i]->TotalPrice]);
        }

        return $orderDetail;
    }

    public static function getOrderHistoryForCustomer($OrderId){
        $OrderDetail['Order'] = DB::table('order')->select('OrderId','CreatedAt','DeliverDate','TotalPrice')->where('OrderId',$OrderId)->get();
        $OrderDetail['Status'] = DB::table('order_status')->join('status','order_status.StatusId','=','status.StatusId')
                                    ->select('status.StatusName')->where('order_status.OrderId',$OrderId)->orderBy('order_status.OrderStatusId','desc')->first();
        $ProductPublish = DB::table('order_detail')
                            ->select('ProductPublishId', 'Quantity', 'TotalPrice')
                            ->where('OrderId',$OrderId)->get();
        foreach($ProductPublish as $item){
            $ProductId[] = DB::table('product_publish')->select('ProductId')
                            ->where('ProductPublishId',$item->ProductPublishId)->first();
        }
        foreach($ProductId as $item){
            $Product[] = DB::table('product')->select('ProductName')
                            ->where('ProductId',$item->ProductId)->first();
        }
        $ProductTemp = "";
        for($i = 0; $i < count($ProductPublish); $i++){
            /*$OrderDetail['Product'][] = $Product[$i];*/
            if(count($ProductPublish) == 1){
                $ProductTemp = ", ".$Product[$i]->ProductName;
            }else{
                $ProductTemp = $ProductTemp.", ".$Product[$i]->ProductName;
            }
        }
        $ProductTemp = substr($ProductTemp, 2);
        $OrderDetail['Product'] = $ProductTemp;
        //dd($OrderDetail);
        return $OrderDetail;
    }
}
