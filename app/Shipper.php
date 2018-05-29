<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = 'shipper';
    protected $primaryKey = 'ShipperId';
    protected $fillable = [
        'ShipperName', 'Phone', 'Address',
    ];
    public $timestamps = false;
}
