<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Auth;
use User;
class Admin
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
        if (Auth::check()) {
            $user=Auth::user();
            if ($user->admin == 1){
            $currentPath = Route::getFacadeRoot()->current()->uri();
            if ($currentPath =="admin/category/view-category" && $user->category_access == 0) {
               return redirect('admin/login')->with('flash_message_error', 'Bạn không có quyền truy cập vào module này');;
            }
            if ($currentPath =="admin/product/view-product" && $user->product_access == 0) {
               return redirect('admin/login')->with('flash_message_error', 'Bạn không có quyền truy cập vào module này');;
            }
            if ($currentPath =="admin/order/view-order" && $user->order_access == 0) {
               return redirect('admin/login')->with('flash_message_error', 'Bạn không có quyền truy cập vào module này');;
            }
            if ($currentPath =="admin/media/view-media" && $user->store_access == 0 || $currentPath =="admin/attribute/view-attribute-size" && $user->store_access == 0 || $currentPath =="admin/coupon/view-coupon" && $user->store_access == 0) {
               return redirect('admin/login')->with('flash_message_error', 'Bạn không có quyền truy cập vào module này');;
            }
            if ($currentPath =="admin/config/view-config" && $user->config_access == 0) {
               return redirect('admin/login')->with('flash_message_error', 'Bạn không có quyền truy cập vào module này');;
            }
            if ($currentPath =="admin/customer/view-customer" && $user->customer_access == 0) {
               return redirect('admin/login')->with('flash_message_error', 'Bạn không có quyền truy cập vào module này');;
            }
           if ($currentPath =="admin/user/view-user" && $user->user_access == 0) {
               return redirect('admin/login')->with('flash_message_error', 'Bạn không có quyền truy cập vào module này');;
            }

            return $next($request); 
            }            
            else
              return redirect('admin/login');
             } 
        else 
        {
          return redirect('admin/login');
        }
    }
}
