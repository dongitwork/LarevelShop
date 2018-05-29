<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaxRequest;
use App\Tax;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function getListTax(){
        $listtax = Tax::all()->sortByDesc("TaxId");
        return view('admin.pages.tax.listtax', compact('listtax'));
    }

    public function getAddTax(){
        return view('admin.pages.tax.addtax');
    }

    public function postAddTax(TaxRequest $request){
        $tax = new Tax();
        $tax->TaxName = $request->tax_name;
        $tax->Percent = $request->percent;
        $tax->Description  = $request->description;
        $tax->save();
        return redirect()->route('tax.list')->with('flash_message','Thêm mới loại Thuế thành công!');
    }
    /*edit*/
    public function getEditTax($id){
        $data = Tax::findOrFail($id);
        return view('admin.pages.tax.edittax',compact('data'));
    }
    public function postEditTax(TaxRequest $request, $id){
        $tax = Tax::findOrFail($id);
        $tax->TaxName = $request->tax_name;
        $tax->Percent = $request->percent;
        $tax->Description  = $request->description;
        $tax->save();
        return redirect()->route('tax.list')->with('flash_message','Sửa loại Thuế thành công!');
    }
    /*delete */

    public function destroy(Request $request, $TaxId)
    {
        $tax = Tax::destroy($TaxId);
        if($tax == TRUE )
        {
            $message = 'Deleted Successfully';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('tax.list')->with('flash_message',$message);
    }

    public function postDeleteAllTax(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Tax::destroy($del_item);
            return redirect()->route('tax.list')->with('flash_message','Xóa thuế thành công!');
        }
        else{
            return redirect()->route('tax.list')->with('flash_message_warning','Bạn chưa chọn thuế để xóa!');
        }
    }
}