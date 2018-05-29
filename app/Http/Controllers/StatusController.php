<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;
use App\Status;

class StatusController extends Controller
{
    //********************************************* LIST STATUS *********************************************
    public function getListStatus(){
        $statuses = Status::all();
        return view('admin.pages.status.list_status', compact('statuses'));
    }

    //********************************************* ADD STATUS *********************************************
    public function getAddStatus(){
        return view('admin.pages.status.add_status');
    }

    public function postAddStatus(StatusRequest $request){
        $status = new Status();
        $status->StatusName = $request->name;
        $status->StatusIcon = $request->icon;
        $status->Description = $request->description;
        $status->save();
        return redirect()->route('status.list')->with('flash_message','THÊM TRẠNG THÁI THÀNH CÔNG');
    }

    //********************************************* ADD STATUS *********************************************
    public function getEditStatus($id){
        $status = Status::findOrFail($id);
        return view('admin.pages.status.edit_status', compact('status'));
    }

    public function postEditStatus(StatusRequest$request, $id){
        $status = Status::findOrFail($id);
        $status->StatusName = $request->name;
        $status->StatusIcon = $request->icon;
        $status->Description = $request->description;
        $status->save();
        return redirect()->route('status.list')->with('flash_message','SỬA TRẠNG THÁI THÀNH CÔNG');
    }

    //********************************************* DELETE STATUS *********************************************
    public function getDeleteStatus($id){
        Status::destroy($id);
        return redirect()->route('status.list')->with('flash_message','XÓA TRẠNG THÁI THÀNH CÔNG');
    }
    public function postDeleteMultiStatus(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Status::destroy($del_item);
            return redirect()->route('status.list')->with('flash_message','XÓA TRẠNG THÁI THÀNH CÔNG');
        }
        else{
            return redirect()->route('status.list')->with('flash_message_warning','BẠN CHƯA CHỌN TRẠNG THÁI ĐỂ XÓA');
        }
    }
}
