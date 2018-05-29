<?php

namespace App\Http\Controllers;

use App\Comment;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Shipper;


class ShipperController extends Controller{
	public function getList(){
        $list = Shipper::all()->sortByDesc("ShipperId"); //cách khác chọn 1 vài column Category::select('CategoryId','CategoryName','Description')->orderBy('CategoryId','ASC')->get();
        return view('admin.pages.shipper.list', compact('list'));
    }

    public function getAdd(){
        return view('admin.pages.shipper.add');
    }

    public function postAdd(Request $request){
        $shipper = new Shipper();
        $shipper->ShipperName = $request->shipper_name;
        $shipper->Phone = $request->Phone;
        $shipper->Address  = $request->Address;
        $shipper->save();
        return redirect()->route('shipper.list')->with('flash_message','Thêm mới nhân viên giao hàng thành công!');
    }

        public function getEdit($id){
        $data = Shipper::findOrFail($id);
        return view('admin.pages.shipper.edit',compact('data'));
    }
    
    public function postEdit(Request $request, $id){
        $shipper = Shipper::findOrFail($id);
        $shipper->ShipperName = $request->shipper_name;
        $shipper->Phone = $request->Phone;
        $shipper->Address  = $request->Address;
        $shipper->save();
        return redirect()->route('shipper.list')->with('flash_message','Sửa nhân viên giao hàng thành công!');
    }

    public function destroy(Request $request, $id)
    {
        $shipper = Shipper::destroy(explode(',',$id));
        if($shipper == TRUE )
        {
            $message = 'Xóa nhân viên giao hàng thành công';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('shipper.list')->with('flash_message',$message);
    }

    public function DleAll(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Shipper::destroy($del_item);
            return redirect()->route('shipper.list')->with('flash_message','Xóa nhân viên giao hàng thành công!');
        }
        else{
            return redirect()->route('shipper.list')->with('flash_message_warning','Bạn chưa chọn nhân viên giao hàng để xóa!');
        }
    }
}
