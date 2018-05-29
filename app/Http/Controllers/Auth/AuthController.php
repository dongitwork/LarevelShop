<?php

namespace App\Http\Controllers\Auth;


use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{

    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'userLogout']);
    }


    public function getUserLogin(){
        return view('admin.login');
    }

    public function postUserLogin(LoginRequest $request){
        $credential_active = array(
            'Email'     => $request->email,
            'password'  => $request->password,
            'Status'    => 1,
        );
        $credential_deactive = array(
            'Email'     => $request->email,
            'password'  => $request->password,
            'Status'    => 0,
        );
        if(Auth::guard('admin')->attempt($credential_active)){      //trả về kiểu bool và login() nếu true
            return redirect()->intended('admin/cpanel')->with('flash_message_success','Đăng nhập thành công');
        }elseif(Auth::guard('admin')->validate($credential_deactive)){  //trả về kiểu bool
            return redirect()->back()->with('flash_message_warning','Tài khoản này chưa được kích hoạt');
        }else{
            return redirect()->back()->with('flash_message_warning','Thông tin đăng nhập không chính xác');
        }
    }
    public function userLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('user.getLogin');
    }

}
