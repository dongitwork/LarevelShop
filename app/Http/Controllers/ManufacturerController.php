<?php

namespace App\Http\Controllers;


use App\Http\Requests\ManufacturerRequest;
use App\Manufacturer;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ManufacturerController extends Controller
{
	public function getListManufacturer(){
        $listmanuf = Manufacturer::all()->sortByDesc("ManufacturerId"); 
        return view('admin.pages.manuf.listnsx', compact('listmanuf'));
    }
    public function getAddManufacturer(){
        return view('admin.pages.manuf.addnsx');
    }

    public function postAddManufacturer(ManufacturerRequest $request){
        $manuf = new Manufacturer();
        $manuf->ManufacturerName = $request->manufacturer_name;
        if($request->hasFile('image')) {
            $file = Input::file('image');
            $Image = $request->manufacturer_name.'.'.$file->getClientOriginalExtension();;
            $manuf->Image = $Image;
            $file->move(public_path().'/images/manufacturer/', $Image);
        }
        $manuf->Description  = $request->description;
        $manuf->save();
        return redirect()->route('manuf.list')->with('flash_message','Thêm mới Nhà sản xuất thành công!');
    }

    public function getEditManufacturer($id){
        $value = Manufacturer::findOrFail($id);
        return view('admin.pages.manuf.editnsx',compact('value'));
    }
    public function postEditManufacturer(ManufacturerRequest $request, $id){
        $manuf = Manufacturer::findOrFail($id);
        $manuf->ManufacturerName = $request->manufacturer_name;
        $manuf->Description  = $request->description;
        if($request->hasFile('image')) {
            $file = Input::file('image');
            $Image = $request->manufacturer_name.'.'.$file->getClientOriginalExtension();;
            $manuf->Image = $Image;
            $file->move(public_path().'/images/manufacturer/', $Image);
        }
        if ($request->curent_images == 1) {
            $manuf->Image = '';
        }

        $manuf->save();
        return redirect()->route('manuf.list')->with('flash_message','Sửa Nhà sản xuất thành công!');
    }

    public function destroy(Request $request, $ManufacturerId)
    {
        $manufacturer = Manufacturer::destroy($ManufacturerId);
        if($manufacturer == TRUE )
        {
            $message = 'Deleted Successfully';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('manuf.list')->with('flash_message',$message);
    }

    public function postDeleteAllManu(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Manufacturer::destroy($del_item);
            return redirect()->route('manuf.list')->with('flash_message','Xóa nhà sản xuất thành công!');
        }
        else{
            return redirect()->route('manuf.list')->with('flash_message_warning','Bạn chưa chọn nhà sản xuất để xóa!');
        }
    }
}