<?php

namespace App\Http\Controllers;


use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Slider;
use DB;

class SliderController extends Controller
{
	public function getListSlider(){
        $ListSlider = Slider::all()->sortByDesc("SliderId"); 
        return view('admin.pages.slider.listslider', compact('ListSlider'));
    }
    public function getAddSlider(){
        $ListProduct = DB::table('product_publish')
        	->join('product','product.ProductId','=','product_publish.ProductId')
        	->select('product_publish.ProductPublishId','product.ProductName')->get();
        $ListProducts = array('' => 'Chon Sản Phẩm');
        foreach ($ListProduct as $key => $value) {
           $ListProducts[$value->ProductPublishId] = $value->ProductName;
        }
        return view('admin.pages.slider.addslider',compact('ListProducts'));
    }

    public function postAddSlider(Request $Request){
        $Slider = new Slider();
        $Slider->Title = $Request->Title;
        if($Request->hasFile('SliderImage')) {
            $file = Input::file('SliderImage');
            $SliderImage = 'Slider_'.$file->getClientOriginalName();
            $Slider->SliderImage = $SliderImage;
            $file->move(public_path().'/images/slider/', $SliderImage);
        }
        $Slider->ProductPublishId  = $Request->ProductPublishId;
        $Slider->save();
        return redirect()->route('Slider.List')->with('flash_message','Thêm mới  thành công!');
    }

    public function getEditSlider($id){
        $Slider = Slider::findOrFail($id);
       	$ListProduct = DB::table('product_publish')
        	->join('product','product.ProductId','=','product_publish.ProductId')
        	->select('product_publish.ProductPublishId','product.ProductName')->get();
        $ListProducts = array('' => 'Chon Sản Phẩm');
        foreach ($ListProduct as $key => $value) {
           $ListProducts[$value->ProductPublishId] = $value->ProductName;
        }
        return view('admin.pages.slider.editslider',compact('Slider','ListProducts'));
    }
    public function postEditSlider(Request $request, $id){
        $Slider = Slider::findOrFail($id);
        $Slider->Title = $request->Title;
        if($request->hasFile('SliderImage')) {
            $file = Input::file('SliderImage');
            $SliderImage = 'Slider_'.$file->getClientOriginalName();
            $Slider->SliderImage = $SliderImage;
            $file->move(public_path().'/images/slider/', $SliderImage);
        }
        $Slider->ProductPublishId  = $request->ProductPublishId;

        if ($request->curent_images == 1) {
            $Slider->SliderImage = '';
        }

        $Slider->save();
        return redirect()->route('Slider.List')->with('flash_message','Sửa thành công!');
    }

    public function getDeleteSlider(Request $request, $id)
    {
        $Slider = Slider::destroy($id);
        if($Slider == TRUE )
        {
            $message = 'Deleted Successfully';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('Slider.List')->with('flash_message',$message);
    }

    public function getDeleteAllSlider(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Slider::destroy($del_item);
            return redirect()->route('Slider.List')->with('flash_message','Xóa  thành công!');
        }
        else{
            return redirect()->route('Slider.List')->with('flash_message_warning','Bạn chưa chọn slider để xóa!');
        }
    }
}