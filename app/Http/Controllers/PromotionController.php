<?php

namespace App\Http\Controllers;


use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Discount;
use App\Gift;



class PromotionController extends Controller
{
	
	/******** Gift **********/
	public function getListGift(){
        $listgift = Gift::all()->sortByDesc("GifttId");
        return view('admin.pages.promotion.gift.listgift', compact('listgift'));
    }

    public function getAddGift(){
        return view('admin.pages.promotion.gift.addgift');
    }

    public function postAddGift(Request $request){
        $gift = new Gift();
        $gift->GiftName  = $request->GiftName;
        $gift->Description  = $request->Description;
        $gift->save();
        return redirect()->route('gift.list')->with('flash_message','Thêm mới Qùa tặng thành công!');
    }

    public function getEditGift($id){
        $value = Gift::findOrFail($id);
        return view('admin.pages.promotion.gift.editgift',compact('value'));
    }
    
    public function postEditGift(Request $request, $id){
        $gift = Gift::findOrFail($id);
        $gift->GiftName  = $request->GiftName;
        $gift->Description  = $request->Description;
        $gift->save();
        return redirect()->route('gift.list')->with('flash_message','Sửa Qùa tặng thành công!');
    }

    /*delete */

    public function GiftDestroy(Request $request, $id)
    {
        $gift = Gift::destroy($id);
        if($gift == TRUE )
        {
            $message = 'Xóa Quà tặng thành công';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('gift.list')->with('flash_message',$message);
    }

    public function GiftDleAll(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Gift::destroy($del_item);
            return redirect()->route('gift.list')->with('flash_message','Xóa quà tặng thành công!');
        }
        else{
            return redirect()->route('gift.list')->with('flash_message_warning','Bạn chưa chọn quà tặng để xóa!');
        }
    }


    /******************** Discount *******************/

    public function getListDiscount(){
        $listdiscount = Discount::all()->sortByDesc("DiscountId");
        return view('admin.pages.promotion.discount.listdiscount', compact('listdiscount'));
    }

    public function getAddDiscount(){
        return view('admin.pages.promotion.discount.adddiscount');
    }

    public function postAddDiscount(Request $request){
        $discount = new Discount();
        $discount->Percent  	= $request->Percent;
        $discount->Description  = $request->Description;
        $discount->save();
        return redirect()->route('discount.list')->with('flash_message','Thêm mới Giảm giá thành công!');
    }

    public function getEditDiscount($id){
        $data = Discount::findOrFail($id);
        return view('admin.pages.promotion.discount.editdiscount',compact('data'));
    }
    
    public function postEditDiscount(Request $request, $id){
        $discount = Discount::findOrFail($id);
        $discount->Percent  = $request->Percent;
        $discount->Description  = $request->Description;
        $discount->save();
        return redirect()->route('discount.list')->with('flash_message','Sửa Giảm giá thành công!');
    }

    /*delete */

    public function DiscountDestroy(Request $request, $id)
    {
        $discount = Discount::destroy($id);
        if($discount == TRUE )
        {
            $message = 'Xóa Giảm giá thành công';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('discount.list')->with('flash_message',$message);
    }

    public function DiscountDleAll(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Discount::destroy($del_item);
            return redirect()->route('discount.list')->with('flash_message','Xóa giảm giá thành công!');
        }
        else{
            return redirect()->route('discount.list')->with('flash_message_warning','Bạn chưa chọn giảm giá để xóa!');
        }
    }
}