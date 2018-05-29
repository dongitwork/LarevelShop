<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Product;
use App\Category;



class HomeController extends Controller
{
    public function index()
	{

        $Category = Category::select('CategoryId')
                    ->where('CategoryName','<>','Phụ kiện')
                    ->orderBy('CategoryId','ASC')
                    ->get();
        $Product = array();
        foreach ($Category as $cate) {
            $Pro =  DB::table('product_publish')
            ->join('product', 'product_publish.ProductId', '=', 'product.ProductId')
            ->join('tax', 'product.TaxId','=','tax.TaxId')
            ->select('product.*','product_publish.*','tax.Percent')
            ->where('product.CategoryId','=',$cate->CategoryId)
            ->where('product_publish.Sticky','=','1')
            ->where('product_publish.Status','=',1)
            ->orderBy('product.ProductId', 'DESC')
            ->take(3)
            ->get();
            foreach ($Pro as  $value) {
                $Product[] = $value;
            }
        }

        $DataMenuHome =  array();
        $Datcate = Category::select()->orderBy('CategoryId','ASC')->get();
        foreach ($Datcate as  $val) {
            $DataMenuHome[$val->CategoryId]['CategoryName'] = $val->CategoryName;
            $DataMenuHome[$val->CategoryId]['CategoryIcon'] = $val->CategoryIcon;
            $data =  DB::table('product_publish')
                    ->join('product', 'product_publish.ProductId', '=', 'product.ProductId')
                    ->join('manufacturer', 'product.ManufacturerId','=','manufacturer.ManufacturerId')
                    ->where('product_publish.Status','=',1)
                    ->where('product.CategoryId','=',$val->CategoryId)
                    ->select('product.ManufacturerId','manufacturer.ManufacturerName')
                    ->get();
            $ManufacturerId = array();
            foreach ($data as  $value) {
                if (!in_array($value->ManufacturerId, $ManufacturerId)) {
                    $DataMenuHome[$val->CategoryId]['Manufacturer'][$value->ManufacturerId] = $value->ManufacturerName;

                    $ManufacturerId[] = $value->ManufacturerId;
                }
            }
        }
/* Slider Home Page */
        $Sliders = DB::table('slider')
        ->join('product_publish', 'product_publish.ProductPublishId', '=', 'slider.ProductPublishId')
        ->join('product', 'product_publish.ProductId', '=', 'product.ProductId')
        ->select('product.ProductId','Title','SliderImage')
        ->orderBy('SliderId', 'DESC')->take(5)->get();

        
		return view('pages.index',compact('Product','DataMenuHome','Sliders'));
	}
    
    public function getPromotion()
    {
        $Promotion =  DB::table('product_publish')
            ->join('product', 'product_publish.ProductId','=','product.ProductId')
            ->leftJoin('tax', 'product.TaxId','=','tax.TaxId')
            ->leftJoin('product_gift','product_publish.ProductPublishId','=','product_gift.ProductPublishId')
            ->leftJoin('product_discount','product_publish.ProductPublishId','=','product_discount.ProductPublishId')
            ->leftJoin('gift','gift.GiftId','=','product_gift.GiftId')
            ->leftJoin('discount','discount.DiscountId','=','product_discount.DiscountId')
            ->where('product_publish.Status','=',1)
            ->Where(function ($query) {
                $query->whereNotNull('product_discount.ProductPublishId')
                      ->orwhereNotNull('product_gift.ProductPublishId');
            })
            ->select('product.*',
                        'product_publish.AdsImage',
                        'product_publish.ProfitPercent',
                        'tax.Percent as taxPercent',
                        'gift.GiftName as GiftName',
                        'product_gift.StartDate as gifStartDate',
                        'product_gift.EndDate as gifEndDate',
                        'discount.Percent as disPercent',
                        'product_discount.StartDate as disStartDate',
                        'product_discount.EndDate as disEndDate' );
             if (!empty($_GET['sortby'])) {
              switch ($_GET['sortby']) {
                case 'giaasc':
                    $Promotion->orderBy('product.Price', 'ASC');
                break;

                case 'giadesc':
                    $Promotion->orderBy('product.Price', 'DESC');
                break; 

                case 'disasc':
                    $Promotion->orderBy('discount.Percent', 'ASC');
                break;

                case 'disdesc':
                    $Promotion->orderBy('discount.Percent', 'DESC');
                break;

                case 'nameasc':
                    $Promotion->orderBy('product.ProductName', 'ASC');
                break;

                case 'namedesc':
                    $Promotion->orderBy('product.ProductName', 'DESC');
                break;
              }
            }else{
              $Promotion->orderBy('product.ProductId', 'DESC');
            }
            $Promotion = $Promotion->get();
            
        return view('pages.promotion', compact('Promotion'));
    }

    public function getSearch(Request $requests)
    {
        $Product =  DB::table('product_publish')
            ->join('product', 'product_publish.ProductId','=','product.ProductId')
            ->leftJoin('tax', 'product.TaxId','=','tax.TaxId')
            ->leftJoin('product_gift','product_publish.ProductPublishId','=','product_gift.ProductPublishId')
            ->leftJoin('product_discount','product_publish.ProductPublishId','=','product_discount.ProductPublishId')
            ->leftJoin('gift','gift.GiftId','=','product_gift.GiftId')
            ->leftJoin('discount','discount.DiscountId','=','product_discount.DiscountId')
            ->where('product_publish.Status','=',1)
            ->where('product.ProductName', 'like', '%'.$requests->searchtext.'%')
            ->select('product.*',
                        'product_publish.AdsImage',
                        'product_publish.ProfitPercent',
                        'tax.Percent as taxPercent',
                        'gift.GiftName as GiftName',
                        'product_gift.StartDate as gifStartDate',
                        'product_gift.EndDate as gifEndDate',
                        'discount.Percent as disPercent',
                        'product_discount.StartDate as disStartDate',
                        'product_discount.EndDate as disEndDate' )
            ->paginate(9);
        $sea = $requests->searchtext;
        return view('pages.search', compact('Product', 'sea'));
    }
    public function getContact(Request $requests){
        return view('pages.contact');
    }
    
}
