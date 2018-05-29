<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
use App\Category;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListCategory(){
        $listcate = Category::all()->sortByDesc("CategoryId"); //cách khác chọn 1 vài column Category::select('CategoryId','CategoryName','Description')->orderBy('CategoryId','ASC')->get();
        return view('admin.pages.cate.listcate', compact('listcate'));
    }

    public function getAddCategory(){
        return view('admin.pages.cate.addcate');
    }

    public function postAddCategory(CategoryRequest $request){
        $cate = new Category();
        $cate->CategoryName = $request->category_name;
        $cate->CategoryIcon = $request->CategoryIcon;
        $cate->Description  = $request->description;
        $cate->save();
        return redirect()->route('cate.list')->with('flash_message','Thêm mới Danh mục thành công!');
    }

    public function getEditCategory($id){
        $data = Category::findOrFail($id);
        return view('admin.pages.cate.editcate',compact('data'));
    }
    
    public function postEditCategory(CategoryRequest $request, $id){
        $cate = Category::findOrFail($id);
        $cate->CategoryName = $request->category_name;
        $cate->CategoryIcon = $request->CategoryIcon;
        $cate->Description  = $request->description;
        $cate->save();
        return redirect()->route('cate.list')->with('flash_message','Sửa Danh mục thành công!');
    }


    public function destroy(Request $request, $CategoryId)
    {
        $category = Category::destroy(explode(',',$CategoryId));
        if($category == TRUE )
        {
            $message = 'Xóa Danh mục thành công';
        }
        else 
        {
            $message = 'No Deleted';
        }
        return redirect()->route('cate.list')->with('flash_message',$message);
    }

    public function CateDleAll(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Category::destroy($del_item);
            return redirect()->route('cate.list')->with('flash_message','Xóa loại sản phẩm thành công!');
        }
        else{
            return redirect()->route('cate.list')->with('flash_message_warning','Bạn chưa chọn loại sản phẩm để xóa!');
        }
    }
}