<?php

namespace App\Http\Middleware\AppMiddleware;

use Closure;
use DB;
use Auth;

class AddOrderStatus
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
        }elseif($collect_perm->contains(58)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}

class EditOrderStatusType
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
        }elseif($collect_perm->contains(59)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
class DeleteOrderStatus
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
        }elseif($collect_perm->contains(60)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
class ListOrderStatus
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
        }elseif($collect_perm->contains(61)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
