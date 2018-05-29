<?php

namespace App\Http\Controllers;

use App\Comment;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ProductOption;
use App\Category;
use App\Manufacturer;
use App\Tax;
use App\Product;
use App\ProductPublish;
use App\ProductDetail;


class ProductController extends Controller{

/********* Product Admin ****************/
    /**************** ADD PRODUCT *****************/ 
    public function getAddProduct()
    {
        $dataAdd = array();

        $cate = array('' => '--- Chọn Loại Sản Phẩm ---');
        $data = Category::all()->sortByDesc("CategoryId");
        foreach ($data as  $value) {
          $cate[$value->CategoryId] = $value->CategoryName;
        }
        $dataAdd['listcate'] = $cate;

        $listmanu = array('' => '--- Chọn Nhà Sản Xuất ---');
        $data = Manufacturer::all()->sortByDesc("ManufacturerId");
        foreach ($data as  $value) {
          $listmanu[$value->ManufacturerId] = $value->ManufacturerName;
        }
        $dataAdd['listmanu'] = $listmanu;

        $listtax = array('' => '--- Chọn Loại Thuế ---');
        $data = Tax::all()->sortByDesc("TaxId");
        foreach ($data as  $value) {
          if ($value->TaxName != 'VAT') {
            $listtax[$value->TaxId] = $value->TaxName;
          }
        }
        $dataAdd['listtax'] = $listtax;
        $dataAdd['vat'] = DB::table('tax')->select('tax.Percent')->where('tax.TaxName','VAT')->first();

        return view('admin.pages.product.addproduct', compact('dataAdd'));
    }

    public function postAddProduct(Request $Request)
    {
      $product = new Product();
      $product->ProductName = $Request->ProductName;
      $product->CreatedAt   = date('Y-m-d H:i:s'); // lấy giờ hiện tại
      $product->UpdatedAt   = date('Y-m-d H:i:s');
      $product->Price       = $Request->Price;
      $product->Quantity    = $Request->Quantity;
      $product->TaxId       = $Request->TaxId;
      $product->CategoryId  = $Request->CategoryId;
      $product->DeviceAttached  = $Request->DeviceAttached;
      $product->Description  = $Request->Description;
      $product->ShortDescription  = $Request->ShortDescription;
      $product->ManufacturerId = $Request->ManufacturerId;

      /******** Check file ********/
      if($Request->hasFile('Image')) {
            $file = Input::file('Image');
            $Image = 'Pro_'.$file->getClientOriginalName();
            $product->Image = $Image;
            $file->move(public_path().'/images/product/', $Image);
      }
      $product->save();

      $DataOption = ProductOption::ListDataOption($product->CategoryId);

      if (!empty($DataOption)) {
          $ProductDetail = new ProductDetail();
          $ProductDetail->ProductId = $product->ProductId;
          foreach ($DataOption as $value) {
              $var = $value->Field;
              $ProductDetail->$var = $Request->$var;
          }
          $ProductDetail->save();
      }

      return redirect()->route('product.list')->with('flash_message','Thêm mới sản phẩm thành công!');
    }

    /******* Ajax data load form add product **********/
    public function getDetailProduct(Request $request, $CategoryId)
    {
      $data = DB::table('product_option')
            ->select('product_option.*')
            ->where('CategoryId','=',$CategoryId)
            ->orderBy('ProductOptionID', 'DESC')
            ->get();

      return view('admin.pages.product.listdetail', compact('data'));
    }

    public function getEditProduct($id)
    {
      $dataEdit = array();
      $cate = array(0 => '--- Chọn Danh Mục ---');
      $data = Category::select('CategoryId','CategoryName')->orderBy('CategoryId','DESC')->get();
      foreach ($data as  $value) {
        $cate[$value->CategoryId] = $value->CategoryName;
      }
      $dataEdit['listcate'] = $cate;

      $listmanu = array(0 => '--- Chọn Nhà Sản Xuất ---');
      $data = Manufacturer::select('ManufacturerId','ManufacturerName')->orderBy('ManufacturerId','DESC')->get();
      foreach ($data as  $value) {
        $listmanu[$value->ManufacturerId] = $value->ManufacturerName;
      }
      $dataEdit['listmanu'] = $listmanu;

      $listtax = array(0 => '--- Chọn Loại Thuế ---');
      $data = Tax::select('TaxId','TaxName')->orderBy('TaxId','DESC')->get();
      foreach ($data as  $value) {
        $listtax[$value->TaxId] = $value->TaxName;
      }
      $dataEdit['listtax'] = $listtax;

      $GiftLists = DB::table('gift')->select('GiftId','GiftName')->orderBy('GiftId', 'DESC')->get();
      $GiftList = array('' => '--- Chọn quà tặng ---');
      foreach ($GiftLists as  $value) {
        $GiftList[$value->GiftId] = $value->GiftName;
      }
      $dataEdit['giftlists'] = $GiftList;

      $Discountlists = DB::table('discount')->select('DiscountId','Percent')->orderBy('Percent', 'ASC')->get();
      $Discountlist = array('' => '--- Chọn giảm giá ---');
      foreach ($Discountlists as  $value) {
        $Discountlist[$value->DiscountId] = $value->Percent.'%';
      }
      $dataEdit['discountlists'] = $Discountlist;

      $Product =  DB::table('product')
                  ->select('product.*')
                  ->where('ProductId','=',$id)
                  ->first();
      $dataEdit['product'] = $Product;

      $product_detail = DB::table('product_detail')
                    ->where('ProductId','=', $Product->ProductId)
                    ->first();

      $detail = ProductOption::ListDataOption($Product->CategoryId);

      if (!empty($product_detail) || !empty($detail)) {
          $dataEdit['product_detail'] = $product_detail;
          $dataEdit['detail'] = $detail;
      }

      $product_publish = DB::table('product_publish')
                  ->select('product_publish.*')
                  ->where('ProductId','=',$id)
                  ->first();
      $dataEdit['product_publish'] =  $product_publish;
        

      if (!empty($product_publish)) {
        $ProductPublishId = $product_publish->ProductPublishId;
        $gift = DB::table('product_gift')
                  ->select('product_gift.*')
                  ->where('ProductPublishId','=',$ProductPublishId)
                  ->first();

        if (!empty($gift)) {
          $dataEdit['gift'] = $gift;
        }

        $discount = DB::table('product_discount')
                  ->select('product_discount.*')
                  ->where('ProductPublishId','=',$ProductPublishId)
                  ->first();
        if (!empty($discount)) {
          $dataEdit['discount'] = $discount;
        }
      }

      $dataEdit = (object) $dataEdit;

      return view('admin.pages.product.editproduct', compact('dataEdit','ProductList'));
    }

    public function postEditProduct(Request $Request, $id)
    {

        $product = Product::findOrFail($id);
        $product->ProductName = $Request->ProductName;
        $product->UpdatedAt   = date('Y-m-d H:i:s');
        $product->Price       = $Request->Price;
        $product->Quantity    = $Request->Quantity;
        $product->TaxId       = $Request->TaxId;
        $product->DeviceAttached       = $Request->DeviceAttached;
        $product->Description  = $Request->Description;
        $product->ShortDescription  = $Request->ShortDescription;
        $product->ManufacturerId = $Request->ManufacturerId;

        /******** Check file ********/
        if($Request->hasFile('Image')) {
              $file = Input::file('Image');
              $Image = 'Pro_'.$file->getClientOriginalName();
              $product->Image = $Image;
              $file->move(public_path().'/images/product/', $Image);
        }
        $product->save();

        /********* Process Product Detail *************/
        $DataOption = ProductOption::ListDataOption($product->CategoryId);
        if (!empty($DataOption)) {
          $ProductDetail =  DB::table('product_detail')->select('ProductId')->where('ProductId',$product->ProductId)->first();

          if (empty($ProductDetail)) {
            $ProductDetail = new ProductDetail();
            $ProductDetail->ProductId = $product->ProductId;
            foreach ($DataOption as $value) {
                $var = $value->Field;
                $ProductDetail->$var = $Request->$var;
            }
            $ProductDetail->save();
          }else{
            $dataDetail = array();
            foreach ($DataOption as $value) {
                $var = $value->Field;
                $dataDetail[$value->Field] = $Request->$var;
            }
            DB::table('product_detail')
              ->where('ProductId',$product->ProductId)
              ->update($dataDetail);
          }
        }

        /******* Process Product Publish Gift or Discount ***********/
        $ProPublish =  DB::table('product_publish')
                        ->select('ProductPublishId')
                        ->where('ProductId',$product->ProductId)
                        ->first();

        if (!empty($ProPublish)) {
            if ($Request->PublishDel == 1) {
              DB::table('product_gift')->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->delete();
              DB::table('product_discount')->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->delete();
              ProductPublish::destroy($ProPublish->ProductPublishId);
            }else{
                $ProductPublish = ProductPublish::findOrFail($ProPublish->ProductPublishId);
                $ProductPublish->Status           = $Request->Status;
                $ProductPublish->Sticky           = $Request->Sticky;
                if($Request->hasFile('AdsImage')) {
                      $file = Input::file('AdsImage');
                      $Image = 'IMG_ADS_'.$file->getClientOriginalName();
                      $ProductPublish->AdsImage = $Image;
                      $file->move(public_path().'/images/product/', $Image);
                }
                $ProductPublish->ProfitPercent    = $Request->ProfitPercent;
                $ProductPublish->PublishedAt      = date('Y-m-d H:i:s');
                $ProductPublish->save();
            }

            /********* Promotion Insert New Record */
            if ($Request->GiftStatus == 1) {
              $gift = array('ProductPublishId' => $ProPublish->ProductPublishId ,
                            'GiftId'=>$Request->GiftId,
                            'StartDate'=>$Request->GiftStartDate,
                            'EndDate'=>$Request->GiftEndDate);

              DB::table('product_gift')->insert($gift);
            }
            if ($Request->DisStatus == 1) {
              $discount = array('ProductPublishId' => $ProPublish->ProductPublishId ,
                                  'DiscountId'=>$Request->DiscountId,
                                  'StartDate'=>$Request->DisStartDate,
                                  'EndDate'=>$Request->DisEndDate);
              DB::table('product_discount')->insert($discount);
            } 

            /* Promotion process Update Or del*/
            $has_gift = DB::table('product_gift')->select('GiftId')
                        ->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->first();
            if (!empty($has_gift)) {
              if ($Request->GiftDel == 1) {
                DB::table('product_gift')->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->delete();
              }else{
                $gift = array('GiftId'=>$Request->GiftId,
                              'StartDate'=>$Request->GiftStartDate,
                              'EndDate'=>$Request->GiftEndDate);
                  DB::table('product_gift')
                    ->where('ProductPublishId',$ProPublish->ProductPublishId)
                    ->update($gift);
              }
            }

            $has_discount = DB::table('product_discount')->select('DiscountId')
                            ->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->first();
            if (!empty($has_discount)) {
                if ($Request->DiscounDel == 1) {
                  DB::table('product_discount')->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->delete();
                }else{
                  $discount = array('DiscountId'=>$Request->DiscountId,
                                      'StartDate'=>$Request->DisStartDate,
                                      'EndDate'=>$Request->DisEndDate);
                    DB::table('product_discount')
                      ->where('ProductPublishId',$ProPublish->ProductPublishId)
                      ->update($discount);
                }
            }
        }

      return redirect()->route('product.list')->with('flash_message','Cập nhật sản phẩm thành công!');    
    }

    
    public function getAddProductPublish()
    {
      $Products = DB::table('product')->select('ProductId','ProductName')->get();
      $Product = array('' => '--- Chọn Sản Phẩm ---');
      foreach ($Products as  $value) {
        $Product[$value->ProductId] = $value->ProductName;
      }
      $Product = $Product;

        return view('admin.pages.product.addproduct_publish',compact('Product'));
    }

    /************ Save ProductPublish ****************/
    public function postAddProductPublish(Request $Request)
    {
        $ProductPublish = new ProductPublish();
        $ProductPublish->Status           = $Request->Status;
        $ProductPublish->Sticky           = $Request->Sticky;
        if($Request->hasFile('AdsImage')) {
              $file = Input::file('AdsImage');
              $Image = 'IMG_ADS_'.$file->getClientOriginalName();
              $ProductPublish->AdsImage = $Image;
              $file->move(public_path().'/images/product/', $Image);
        }
        $ProductPublish->ProfitPercent    = $Request->ProfitPercent;
        $ProductPublish->PublishedAt      = date('Y-m-d H:i:s');
        $ProductPublish->ProductId        = $Request->ProductId;
        $ProductPublish->save();

        /************ Save Promotion ***************/
        if ($Request->GiftStatus == 1) {
          $gift = array('ProductPublishId' => $ProductPublish->ProductPublishId ,
                        'GiftId'=>$Request->GiftId,
                        'StartDate'=>$Request->GiftStartDate,
                        'EndDate'=>$Request->GiftEndDate);

          DB::table('product_gift')->insert($gift);
        }
        if ($Request->DisStatus == 1) {
          $discount = array('ProductPublishId' => $ProductPublish->ProductPublishId ,
                              'DiscountId'=>$Request->DiscountId,
                              'StartDate'=>$Request->DisStartDate,
                              'EndDate'=>$Request->DisEndDate);
          DB::table('product_discount')->insert($discount);
        }

      return redirect()->route('product.list')->with('flash_message','Thêm vào sản phẩm hiển thị thành công!');
    }

    /********** Check Return Ajax Product On Add Product Publish ******/
    public function getCheckProcuct($id)
    {
        $product = DB::table('product_publish')->select('ProductId')->where('ProductId','=',$id)->first();
        if (!empty($product)) {
          return 'Sản phẩm này đã có';
        }
    }

    /******* Return Form to Ajax Load Promotion on Product Publish */
    public function getAddPromotion($Type)
    {
        $Promotion = array();
        switch ($Type) {
          case 'gift':
            $Gifts = DB::table('gift')->select('GiftId','GiftName')->orderBy('GiftId', 'DESC')->get();
            $Gift = array('' => '--- Chọn quà tặng ---');
            foreach ($Gifts as  $value) {
              $Gift[$value->GiftId] = $value->GiftName;
            }
            $Promotion = $Gift;
            break;
          case 'discount':
            $Discounts = DB::table('discount')->select('DiscountId','Percent')->orderBy('Percent', 'ASC')->get();
            $Discount = array('' => '--- Chọn giảm giá ---');
            foreach ($Discounts as  $value) {
              $Discount[$value->DiscountId] = $value->Percent.'%';
            }
            $Promotion = $Discount;
            break;
          default:
            return 'sai định dạng';
        }

        return view('admin.pages.promotion.loadformadd',compact('Promotion','Type'));
    }

    /************** Del Product All *********/
    public function destroy($id)
    {
        $psId = DB::table('product_publish')
                ->select('ProductPublishId')
                ->where('ProductId','=', $id)->first();
                
        if (!empty($psId)) {
          DB::table('product_gift')->where('ProductPublishId','=', $psId->ProductPublishId)->delete();
          DB::table('product_discount')->where('ProductPublishId','=', $psId->ProductPublishId)->delete();
          DB::table('product_publish')->where('ProductId','=', $id)->delete();
        }
        
        DB::table('product_detail')->where('ProductId','=', $id)->delete();
        $product = Product::destroy($id);

        if($product == TRUE )
        {
            $message = 'Xóa sản phẩm thành công';
        }
        else 
        {
            $message = 'Không xóa được rồi!';
        } 
        return redirect()->route('product.list')->with('flash_message',$message);  
    }

    /*********** Danh sách sản phẩm Admin ************/
    public function getListProduct()
    {
      $ProductPr =  DB::table('product')
            ->leftjoin('category', 'product.CategoryId','=','category.CategoryId')
            ->leftjoin('manufacturer', 'product.ManufacturerId','=','manufacturer.ManufacturerId')
            ->leftjoin('tax', 'product.TaxId','=','tax.TaxId')
            ->select('product.*','category.CategoryName','manufacturer.ManufacturerName','tax.Percent')
            ->orderBy('product.ProductId', 'DESC');
        if (!empty($_GET['type']) && $_GET['type'] == 'publish') {
          $Product->join('product_publish','product.ProductId','=','product_publish.ProductId');
        }
      $Product = $ProductPr->paginate(10);
      return view('admin.pages.product.listproduct', compact('Product'));
    }

    /*********** Danh sách sản phẩm khuyến mãi Admin ************/
    public function getListProductPromotion()
    { 
      $ProductPromotion =  DB::table('product_publish')
            ->join('product', 'product_publish.ProductId','=','product.ProductId')
            ->leftJoin('product_discount','product_publish.ProductPublishId','=','product_discount.ProductPublishId')
            ->leftJoin('discount','discount.DiscountId','=','product_discount.DiscountId')
            ->leftJoin('product_gift','product_publish.ProductPublishId','=','product_gift.ProductPublishId')
            ->leftJoin('gift','gift.GiftId','=','product_gift.GiftId')
            ->select('product_publish.ProductId', 'product.ProductName', 'discount.Percent as disPercent','product_publish.ProfitPercent', 'gift.GiftName')
             ->Where(function ($query) {
                $query->whereNotNull('product_discount.ProductPublishId')
                      ->orwhereNotNull('product_gift.ProductPublishId');
            })
            ->orderBy('product_publish.ProductPublishId', 'DESC')->paginate(10);
      return view('admin.pages.product.listproductmotion', compact('ProductPromotion'));
    }

    public function getEditProductPromotion($id)
    {
      $dataEdit = array();
      $GiftLists = DB::table('gift')->select('GiftId','GiftName')->orderBy('GiftId', 'DESC')->get();
      $GiftList = array('' => '--- Chọn quà tặng ---');
      foreach ($GiftLists as  $value) {
        $GiftList[$value->GiftId] = $value->GiftName;
      }
      $dataEdit['giftlists'] = $GiftList;

      $Discountlists = DB::table('discount')->select('DiscountId','Percent')->orderBy('Percent', 'ASC')->get();
      $Discountlist = array('' => '--- Chọn giảm giá ---');
      foreach ($Discountlists as  $value) {
        $Discountlist[$value->DiscountId] = $value->Percent.'%';
      }
      $dataEdit['discountlists'] = $Discountlist;
      $Product =  DB::table('product')
                  ->select('product.*')
                  ->where('ProductId','=',$id)
                  ->first();
      $dataEdit['product'] = $Product;

      $product_publish = DB::table('product_publish')
                  ->select('product_publish.*')
                  ->where('ProductId','=',$id)
                  ->first();
      $dataEdit['product_publish'] =  $product_publish;
        

      if (!empty($product_publish)) {
        $ProductPublishId = $product_publish->ProductPublishId;
        $gift = DB::table('product_gift')
                  ->select('product_gift.*')
                  ->where('ProductPublishId','=',$ProductPublishId)
                  ->first();

        if (!empty($gift)) {
          $dataEdit['gift'] = $gift;
        }

        $discount = DB::table('product_discount')
                  ->select('product_discount.*')
                  ->where('ProductPublishId','=',$ProductPublishId)
                  ->first();
        if (!empty($discount)) {
          $dataEdit['discount'] = $discount;
        }
      }

      $dataEdit = (object) $dataEdit;

      return view('admin.pages.product.edit_productpromotion', compact('dataEdit'));

    }

    public function postEditProductPromotion(Request $Request, $id)
    {


        /******* Process Product Publish Gift or Discount ***********/
        $ProPublish =  DB::table('product_publish')
                        ->select('ProductPublishId')
                        ->where('ProductId',$id)
                        ->first();

        if (!empty($ProPublish)) {

            /********* Promotion Insert New Record */
            if ($Request->GiftStatus == 1) {
              $gift = array('ProductPublishId' => $ProPublish->ProductPublishId ,
                            'GiftId'=>$Request->GiftId,
                            'StartDate'=>$Request->GiftStartDate,
                            'EndDate'=>$Request->GiftEndDate);

              DB::table('product_gift')->insert($gift);
            }
            if ($Request->DisStatus == 1) {
              $discount = array('ProductPublishId' => $ProPublish->ProductPublishId ,
                                  'DiscountId'=>$Request->DiscountId,
                                  'StartDate'=>$Request->DisStartDate,
                                  'EndDate'=>$Request->DisEndDate);
              DB::table('product_discount')->insert($discount);
            } 

            /* Promotion process Update Or del*/
            $has_gift = DB::table('product_gift')->select('GiftId')
                        ->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->first();
            if (!empty($has_gift)) {
              if ($Request->GiftDel == 1) {
                DB::table('product_gift')->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->delete();
              }else{
                $gift = array('GiftId'=>$Request->GiftId,
                              'StartDate'=>$Request->GiftStartDate,
                              'EndDate'=>$Request->GiftEndDate);
                  DB::table('product_gift')
                    ->where('ProductPublishId',$ProPublish->ProductPublishId)
                    ->update($gift);
              }
            }

            $has_discount = DB::table('product_discount')->select('DiscountId')
                            ->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->first();
            if (!empty($has_discount)) {
                if ($Request->DiscounDel == 1) {
                  DB::table('product_discount')->where('ProductPublishId', '=', $ProPublish->ProductPublishId)->delete();
                }else{
                  $discount = array('DiscountId'=>$Request->DiscountId,
                                      'StartDate'=>$Request->DisStartDate,
                                      'EndDate'=>$Request->DisEndDate);
                    DB::table('product_discount')
                      ->where('ProductPublishId',$ProPublish->ProductPublishId)
                      ->update($discount);
                }
            }
          }
        return redirect()->route('product.listpromotion')->with('flash_message','Cập nhật sản phẩm khuyến mãi thành công!');
    }

/*********** End Product Admin ***********8*/


    /****************** Hiển thị thông tin chi tiết **************/
    public function getShowProduct($id)
    {
      $Product =  array();
      $DataProduct =  DB::table('product_publish')
                              ->join('product', 'product_publish.ProductId', '=', 'product.ProductId')
                              ->leftjoin('category', 'product.CategoryId','=','category.CategoryId')
                              ->leftjoin('manufacturer', 'product.ManufacturerId','=','manufacturer.ManufacturerId')
                              ->leftjoin('tax', 'product.TaxId','=','tax.TaxId')
                              ->select('product.*','product.Description as proDescription','product_publish.*','category.*','tax.Percent','manufacturer.ManufacturerName')
                              ->where('product.ProductId','=',$id)
                              ->first();
      $Product['product'] = $DataProduct;

      $product_detail = DB::table('product_detail')
                    ->where('ProductId','=', $DataProduct->ProductId)
                    ->orderBy('ProductDetailId', 'ASC')
                    ->first();

      $detail         = ProductOption::ListDataOption($DataProduct->CategoryId);
      if (!empty($product_detail) || !empty($detail)) {
          $Product['product_detail'] = $product_detail;
          $Product['detail'] = $detail;
      }
      
      $Product['gift'] = DB::table('product_gift')
                            ->select('gift.*')
                            ->join('gift','gift.GiftId','=','product_gift.GiftId')
                            ->where('ProductPublishId','=',$DataProduct->ProductPublishId)
                            ->select()->first(); 

      $Product['discount'] = DB::table('product_discount')
                            ->select('product_discount.*','discount.*')
                            ->join('discount','discount.DiscountId','=','product_discount.DiscountId')
                            ->where('ProductPublishId','=',$DataProduct->ProductPublishId)
                            ->select()->first(); 
      $Product['replace'] = DB::table('product_publish')
                            ->join('product', 'product_publish.ProductId','=','product.ProductId')
                            ->leftJoin('tax', 'product.TaxId','=','tax.TaxId')
                            ->leftJoin('product_discount','product_publish.ProductPublishId','=','product_discount.ProductPublishId')
                            ->leftJoin('discount','discount.DiscountId','=','product_discount.DiscountId')
                            ->leftJoin('product_gift','product_publish.ProductPublishId','=','product_gift.ProductPublishId')
                            ->leftJoin('gift','gift.GiftId','=','product_gift.GiftId')
                            ->join('category','product.CategoryId', '=', 'category.CategoryId')
                            ->where('product_publish.Status','=',1)
                            ->where('product.CategoryId', '=', $DataProduct->CategoryId)
                            ->where('product.ProductId', '<>', $DataProduct->ProductId)
                            ->select('product_publish.AdsImage','product_publish.ProductId', 'product.ProductName', 'product.Price', 'discount.Percent as disPercent', 'tax.Percent as taxPercent',  'product_publish.ProfitPercent', 'gift.GiftName')
                            ->get();
      $Product['comment'] = Comment::getCommentInfo($Product['product']->ProductPublishId);
      return view('pages.productdetail', compact('Product'));
    }

    /******** List Product by categories ************8*/
    public function getProductByCategory($CategoryId)
    {
        $Product =  DB::table('product_publish')
            ->join('product', 'product_publish.ProductId', '=', 'product.ProductId')
            ->leftjoin('tax', 'product.TaxId','=','tax.TaxId')
            ->leftJoin('product_discount','product_publish.ProductPublishId','=','product_discount.ProductPublishId')
            ->leftJoin('discount','discount.DiscountId','=','product_discount.DiscountId')
            ->select('product.*','product_publish.*','tax.Percent','discount.Percent as disPercent')
            ->where('product.CategoryId','=',$CategoryId)
            ->where('product_publish.Status','=',1);
            if(!empty($_GET["nxs"]) && isset($_GET["nxs"])){
                $Product->where('product.ManufacturerId','=',$_GET["nxs"]);
            }
            if (!empty($_GET['sortby'])) {
              switch ($_GET['sortby']) {
                case 'giaasc':
                    $Product->orderBy('product.Price', 'ASC');
                break;

                case 'giadesc':
                    $Product->orderBy('product.Price', 'DESC');
                break;

                case 'nameasc':
                    $Product->orderBy('product.ProductName', 'ASC');
                break;

                case 'namedesc':
                    $Product->orderBy('product.ProductName', 'DESC');
                break;
              }
            }else{
              $Product->orderBy('product.ProductId', 'DESC');
            }

        $Product =  $Product->paginate(9);

        $Category = Category::select('CategoryName')
                    ->where('CategoryId','=',$CategoryId)
                    ->first();

        if ($Category->CategoryName == 'Phụ kiện') {
          return view('pages.phukien',compact('Product'));
        }else{
          return view('pages.ProductByCategory',compact('Product','Category'));
        }
        
    }  
}