<?php

namespace App\Http\Middleware\AppMiddleware;

use Closure;
use DB;
use Auth;

class AddManu
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
        }elseif($collect_perm->contains(37)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}

class EditManu
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
        }elseif($collect_perm->contains(38)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
class DeleteManu
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
        }elseif($collect_perm->contains(39)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
class ListManu
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
        }elseif($collect_perm->contains(40)){
            return $next($request);
        }
        return redirect()->back()->with('flash_message_danger','BẠN KHÔNG CÓ QUYỀN SỬ DỤNG CHỨC NĂNG NÀY');
    }
}
