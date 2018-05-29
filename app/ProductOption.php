<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


class ProductOption extends Model
{
    protected $table      = 'product_option';
    public    $timestamps = false;
    protected $primaryKey = 'ProductOptionId';
    protected $fillable   = [
        'CategoryId','Field','Label','Type','Description',
    ];

    public static function ListDataOption($CategoryId)
    {
       $DataOption = DB::table('product_option')
                    ->select('Field','Label')
                    ->where('CategoryId','=',$CategoryId)
                    ->orderBy('ProductOptionID', 'ASC')
                    ->get();
        return $DataOption;
    }
}
