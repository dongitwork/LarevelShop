<?php

namespace App\Http\Middleware\AppMiddleware;

use Closure;
use DB;
use Auth;

class AddGift
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$permission = DB::table('role_permission')->where('RoleId',Auth::guard('admin')->user()->RoleId)->pluck('PermissionId');
		$collect_perm = collect($permission);
		if(Auth::guard('admin')->user()->RoleId == 1){
			return $next($request);
		}elseif($collect_perm->contains(5)){
			return $next($request);
		}
		return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
	}
}

class EditGift
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$permission = DB::table('role_permission')->where('RoleId',Auth::guard('admin')->user()->RoleId)->pluck('PermissionId');
		$collect_perm = collect($permission);
		if(Auth::guard('admin')->user()->RoleId == 1){
			return $next($request);
		}elseif($collect_perm->contains(6)){
			return $next($request);
		}
		return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
	}
}
class DeleteGift
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$permission = DB::table('role_permission')->where('RoleId',Auth::guard('admin')->user()->RoleId)->pluck('PermissionId');
		$collect_perm = collect($permission);
		if(Auth::guard('admin')->user()->RoleId == 1){
			return $next($request);
		}elseif($collect_perm->contains(7)){
			return $next($request);
		}
		return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
	}
}
class ListGift
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$permission = DB::table('role_permission')->where('RoleId',Auth::guard('admin')->user()->RoleId)->pluck('PermissionId');
		$collect_perm = collect($permission);
		if(Auth::guard('admin')->user()->RoleId == 1){
			return $next($request);
		}elseif($collect_perm->contains(8)){
			return $next($request);
		}
		return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
	}
}
