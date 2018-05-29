<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


class Manufacturer extends Model
{
    protected $table      = 'manufacturer';
    public    $timestamps = false;
    protected $primaryKey = 'ManufacturerId';
    protected $fillable   = [
        'CategoryName', 'Image', 'Description', 
    ];
}