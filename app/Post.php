<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table      = 'post';
    public    $timestamps = false;
    protected $primaryKey = 'PostId';
    protected $fillable   = [
        'UserId', 'PostCategoryId','Title','Body','Active','CreatedAt','UpdatedAt',
    ];

    public static function GetDataFooter()
    {
    	$data =  array();
    	$cate = DB::table('post_category')->select('post_category.*')->get();
    	if (!empty($cate)) {
    		foreach ($cate as  $value) {
    			$data[$value->PostCategoryId]['PostCategoryName'] = $value->PostCategoryName;
	    		$data[$value->PostCategoryId]['post'] = DB::table('post')
		        ->select('post.*')
		        ->where('post.PostCategoryId','=',$value->PostCategoryId)
		        ->where('post.Active','=',1)
		        ->orderBy('PostId', 'DESC')
		        ->take(5)
		        ->get();
	    	}
	    }

	    return $data;    
	}
}
