<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'StatusId';
    protected $fillable = [
        'StatusName','Description',
    ];
    public $timestamps = false;
}

class OrderStatus extends Model
{
    protected $table = 'order_status';
    protected $primaryKey = 'OrderStatusId';
    protected $fillable = [
        'OrderId', 'StatusId', 'UserId', 'ShipperId', 'DateModified',
    ];
    public $timestamps = false;

    public static function getOrderStatus($id){
        $statusId = DB::table('order_status')->select('StatusId')->where('OrderId', $id)->orderBy('OrderStatusId','desc')->first();
        $status = DB::table('status')->select('StatusName','StatusIcon')->where('StatusId', $statusId->StatusId)->first();
        return $status;
    }
    public static function getShipperId($id){
        $shipperId = DB::table('order_status')->select('ShipperId')->where('OrderId', $id)->orderBy('OrderStatusId','desc')->first();
        return $shipperId;
    }
}