<?php

namespace App\Http\Controllers\Auth;


use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class CustomerAuthController extends Controller
{

    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest.customer', ['except' => 'customerLogout']);
    }

    public function getCustomerLogin(){
        session()->put('PreviousUrl',url()->previous());
        return view('pages.customer.login');
    }

    public function postCustomerLogin(LoginRequest $request){
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
        if(Auth::guard('customer')->attempt($credential_active)){      //trả về kiểu bool và login() nếu true
            $PreviousUrl = session()->pull('PreviousUrl');
            return redirect()->to($PreviousUrl);
        }elseif(Auth::guard('customer')->validate($credential_deactive)){  //trả về kiểu bool
            return redirect()->back()->with('flash_message_warning','Tài khoản này chưa được kích hoạt');
        }else{
            return redirect()->back()->with('flash_message_warning','Thông tin đăng nhập không chính xác');
        }
    }

    public function customerLogout(){
        Auth::guard('customer')->logout();
        return redirect()->route('home');
    }
}
