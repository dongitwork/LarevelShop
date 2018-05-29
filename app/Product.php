<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use App\Category;




class Product extends Model
{
    protected $table      = 'product';
    public    $timestamps = false;
    protected $primaryKey = 'ProductId';
    protected $fillable   = ['ProductName', 'CreatedAt', 'UpdatedAt', 
    							'Price', 'Quantity', 'TaxId', 'CategoryId', 'ManufacturerId' ];
   


    public function ProductPublish()
    {
        return $this->hasOne(ProductPublish::class,'ProductId');
    }
}

/**
* ProductPublish ax product
*/
class ProductPublish extends Model
{
	protected $table      = 'product_publish';
    public    $timestamps = false;
    protected $primaryKey = 'ProductPublishId';
    protected $fillable   = [ 'Status', 'AdsImage','PublishedAt', 'ProductId' ];

	public static function GetProductPublishId($ProductId)
	{
		$ProductPublishId = DB::table('product_publish')
            ->select('ProductPublishId')
            ->where('ProductId','=',$ProductId)
            ->first();
        return $ProductPublishId->ProductPublishId;
	}

	public static function ProductPublishUpdate($ProductId,$Data)
	{
		$update = DB::table('product_publish')
            ->where('ProductId', $ProductId)
            ->update($Data);
        return$update;
	}

}

/**
* ProductDetail ex product
*/
class ProductDetail extends Model
{
	protected $table      = 'product_detail';
    public    $timestamps = false;
    protected $primaryKey = 'ProductDetailId';
    protected $fillable   = ['ProductId'];

   public static function GetProductDetail($ProductId)
   {
   		return DB::table('product_detail')
                    ->where('ProductId','=', $ProductId)
                    ->first();
   }
	
    public static function CkeckProductDetail($ProductId)
    {
    	return DB::table('product_detail')
	            ->select('ProductId')
	            ->where('ProductId','=',$ProductId)
	            ->first();

    }

    public static function ProductDetailUpdate($ProductId,$Data)
    {
    	DB::table('product_detail')
              ->where('ProductId', $ProductId)
              ->update($Data);
    }
}


class Gift extends Model
{
    
    protected $table      = 'gift';
    public    $timestamps = false;
    protected $primaryKey = 'GiftId';
    protected $fillable   = ['GiftName','Description'];

    function __construct()
    {
        
    }
}

/**
* 
*/
class Discount extends Model
{
    protected $table      = 'discount';
    public    $timestamps = false;
    protected $primaryKey = 'DiscountId';
    protected $fillable   = ['Percent','Description'];

    function __construct()
    {
        
    }
}