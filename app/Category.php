<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table      = 'category';
    public    $timestamps = false;
    protected $primaryKey = 'CategoryId';
    protected $fillable   = [
        'CategoryName', 'CategoryIcon','Description',
    ];

    public static function GetCategoryMenu()
   {
        $MenuHome =  array();
        $Datcate = DB::table('category')->select('CategoryId','CategoryName', 'CategoryIcon')
                    ->orderBy('CategoryId','ASC')->take(5)->get();
        foreach ($Datcate as  $val) {
            $MenuHome[$val->CategoryId]['CategoryName'] = $val->CategoryName;
            $MenuHome[$val->CategoryId]['CategoryIcon'] = $val->CategoryIcon;
        }
        return $MenuHome;
   }
}
