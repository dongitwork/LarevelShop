<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

	public function login()
	{
		return view('admin.pages.login');
	}
	public function adminmain()
	{
		//session()->put('shoppingitem',['laptop_asus','laptop_toshiba']);
		//session()->push('shoppingitem', 'laptop_dell');
		//return session()->all();
		
		//return auth()->user();
		return view('admin.pages.adminmain');
	}

}
