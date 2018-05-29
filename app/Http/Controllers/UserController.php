<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //************************************ LIST USER ************************************
    public function getListUser(){
        $data = User::select('UserId','UserName','Status','Email','Address','Birthday','Gender','Phone','RoleId')->get();
        $role = Role::select('RoleId','RoleName')->get();
        return view('admin.user.list_user',compact('data','role'));
    }
    //************************************ ADD USER ************************************
    public function getAddUser(){
        $listRole = Role::select('RoleId','RoleName')->get();
        return view('admin.user.add_user',compact('listRole'));
    }
    public function postAddUser(UserRequest $request){
        $user = new User();
        $user->UserName = $request->username;
        $user->Email    = $request->email;
        $user->Password = Hash::make($request->password);
        $user->Address  = $request->address;
        $user->Birthday = $request->birthday;
        $user->Phone    = $request->phone;
        $user->Gender   = $request->gender;
        $user->Status   = $request->status;
        $user->RoleId   = $request->role;
        $user->save();
        return redirect()->route('user.list')->with('flash_message','Thêm mới User thành công');
    }
    //************************************ EDIT USER ************************************
    public function getEditUser($id){
        //If you just need to retrieve a single row from the database table, you may use the first method. This method will return a single StdClass object:
        //$data = User::select('UserId','UserName','Status','Email','Address','Birthday','Gender','Phone','RoleId')->where('UserId',$id)->first();
        $data = User::findOrFail($id);
        $listRole = Role::select('RoleId','RoleName')->get();
        return view('admin.user.edit_user',compact('data','listRole'));
    }
    public function postEditUser(UserRequest $request, $id){
        $user = User::findOrFail($id);
        $user->UserName = $request->username;
        $user->Email    = $request->email;
        $user->Address  = $request->address;
        $user->Birthday = $request->birthday;
        $user->Phone    = $request->phone;
        $user->Gender   = $request->gender;
        $user->Status   = $request->status;
        $user->RoleId   = $request->role;
        $user->save();
        return redirect()->route('user.list')->with('flash_message','Sửa User thành công!');
    }
    //************************************ DELETE USER ************************************
    public function getDeleteUser($id){
        User::destroy($id);
        return redirect()->route('user.list')->with('flash_message','Xóa User thành công!');
    }
    public function postDeleteAllUser(){

    }

    public function UserDleAll(Request $request){
        $del_item = $request->input('checkbox_delete');
        if(!collect($del_item)->isEmpty()){
            User::destroy($del_item);
            return redirect()->route('user.list')->with('flash_message','Xóa nhân viên thành công!');
        }
        else{
            return redirect()->route('user.list')->with('flash_message_warning','Bạn chưa chọn nhân viên để xóa!');
        }
    }
}
