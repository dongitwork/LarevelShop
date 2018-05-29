<?php

namespace App\Http\Middleware\AppMiddleware;

use Closure;
use DB;
use Auth;

class AddCategory
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
        }elseif($collect_perm->contains(33)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}

class EditCategory
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
        }elseif($collect_perm->contains(34)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
class DeleteCategory
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
        }elseif($collect_perm->contains(35)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
class ListCategory
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
        }elseif($collect_perm->contains(36)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
