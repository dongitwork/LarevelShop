<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use DB;
use App\Http\Requests\CategoryRequest;
use App\ProductOption;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;

class ProductOptionController extends Controller{

    public static function getListOption()
    {
      $data = DB::table('product_option')
            ->join('category', 'product_option.CategoryId', '=', 'category.CategoryId')
            ->select('product_option.*', 'category.CategoryName')
            ->orderBy('product_option.CategoryId', 'DESC')
            ->get();
      return view('admin.pages.productoption.list', compact('data'));
    }

    public static function getAddOption()
     {
          $data_op = array();
          $prooption = array('0' => 'Chọn trường đã có');
          $data = DB::table('product_option')
            ->select('product_option.Field','product_option.Label')
            ->orderBy('ProductOptionID', 'DESC')
            ->get();
          foreach ($data as  $value) {
            $prooption[$value->Field] = $value->Label.' ('.$value->Field.')';
          }
          $data_op['prooption'] = $prooption;

          $listcate = Category::all()->sortByDesc("CategoryId");
          $optioncate = array();
          foreach ($listcate as  $value) {
            $optioncate[$value->CategoryId] = $value->CategoryName;
          }
          $data_op['optioncate'] = $optioncate;

          return view('admin.pages.productoption.add', compact('data_op'));
    }

    public static function postAddOption(Request $Request){
        $Option = new ProductOption();
        $Option->CategoryId = $Request->CategoryId;
        $Option->Field      = $Request->Field;
        $Option->Label      = $Request->Label;
        $Option->Type       = $Request->Type;
        $Option->Description  = $Request->Description;

        if ($Request->OldField <> '0') {
          $data = DB::table('product_option')
            ->select('product_option.Field','product_option.Label','product_option.Type')
            ->where('Field','=',$Request->OldField)
            ->groupBy('Field')
            ->orderBy('ProductOptionID', 'DESC')
            ->get();

            $Option->Field  = $data[0]->Field;
            $Option->Label  = $data[0]->Label;
            $Option->Type   = $data[0]->Type;
        }
        $Option->save();

        if ($Request->OldField == '0') {
          DB::statement('ALTER TABLE product_detail ADD '.$Request->Field.' '.$Request->Type.' NOT NULL');
        }

        return redirect()->route('ProOption.list')->with('flash_message','Thêm mới thuộc tính thành công!');
    }

    public static function getEditOption($id)
    {
      $data = ProductOption::findOrFail($id);
      $CategoryName = DB::table('category')->where('CategoryId', '=',$data->CategoryId)->get();
      $CategoryName = $CategoryName[0]->CategoryName;
      $data->CategoryName = $CategoryName;
      return view('admin.pages.productoption.edit', compact('data'));
    }

    public static function postEditOption(Request $Request){
        $data = ProductOption::findOrFail($Request->ProductOptionId);
        $data->Label = $Request->Label;
        $data->Description  = $Request->Description;
        $data->save();
        return redirect()->route('ProOption.list')->with('flash_message','Sửa Thuộc tính thành công!');
    }

    public static function destroy($id)
    {
      $data = ProductOption::findOrFail($id);    //lấy data cần xóa
      $num = DB::table('product_option')
            ->select('Field')
            ->where('Field', '=',$data->Field)
            ->get();
      if (count($num) <= 1) {
        DB::statement('ALTER TABLE product_detail DROP '.$data->Field);
      }

      $result = ProductOption::destroy($id);
      if($result == TRUE )
      {
          $message = 'Xóa Giảm giá thành công';
      }
      else 
      {
          $message = 'No Deleted';
      }
      return redirect()->route('ProOption.list')->with('flash_message','Đã xóa thuộc tính thành công!');
    }
}