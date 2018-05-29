<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Requests;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    //************************************ MANAGER ROLE ************************************
    public function getManagerRP(){
        return view('admin.user.role.manager_role');
    }
    public function postManagerRP(){

    }
    //************************************ LIST ROLE ************************************
    public function getListRole(){
        $data = Role::all();
        return view('admin.user.role.list_role', compact('data'));
    }

    //************************************ ADD ROLE ************************************
    public function getAddRole(){
        return view('admin.user.role.add_role');
    }
    public function postAddRole(RoleRequest $request){
        $role = new Role();
        $role->RoleName = $request->role_name;
        $role->Description  = $request->description;
        $role->save();
        return redirect()->route('role.list')->with('flash_message','Thêm Role thành công!');
    }

    //************************************ EDIT ROLE ************************************
    public function getEditRole($id){
        $data = Role::findOrFail($id);
        return view('admin.user.role.edit_role',compact('data'));
    }
    public function postEditRole(RoleRequest $request, $id){
        $role = Role::findOrFail($id);
        $role->RoleName = $request->role_name;
        $role->Description = $request->description;
        $role->save();
        return redirect()->route('role.list')->with('flash_message','Sửa Role thành công!');
    }

    //************************************ DELETE ROLE ************************************
    public function getDeleteRole($id){
        Role::destroy($id);
        return redirect()->route('role.list')->with('flash_message','Xóa Role thành công!');
    }
    public function postDeleteAllRole(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            Role::destroy($del_item);
            return redirect()->route('role.list')->with('flash_message','Xóa Role thành công!');
        }
        else{
            return redirect()->route('role.list')->with('flash_message_warning','Bạn chưa chọn Role để xóa!');
        }
    }
}
