<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Config;
use App\Category;
use App\Media;
use Cart;
class AppServiceProvider extends ServiceProvider
{

    public function get_menu_data($parent_id = 0, $type = '', $status = 1) {
        $category  = Category::orderBy('created_at', 'asc')->get()->toArray();
        $menu_data = [];
        foreach ($category as $category_item) {
            if ($category_item['parent_id'] == $parent_id) {
                $cate_status = $category_item['status'];
                if ($status = $cate_status) {
                    $menu_data[] = $category_item;
                }
            }
        }
        if ($menu_data && count($menu_data) > 0) {
            foreach ($menu_data as $key => $item) {
                // Đệ quy cấp con của danh mục
                $data_child               = $this->get_menu_data($item['id']);
                $menu_data[$key]['child'] = $data_child;
            }
        }
        return $menu_data;
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            view()->composer('*', function ($view) {
               
                //Get dataUser
                if (Auth::check() == true) {
                    $userLogin = Auth::user();
                    // $role_id = $userLogin->role_id;
                    // $role_value = Role::where("id", $role_id)->value("value");
                    // $userLogin->role_value = $role_value;
                    $view->with('userLogin', $userLogin);
                }
                $dataSearch = Category::where('parent_id',0)->get();
                 $view->with('dataSearch', $dataSearch);
                 //Config
                $dataConfig = Config::find(1);
                $view->with('dataConfig', $dataConfig);
                //Menu home
                $menu_data = $this->get_menu_data(0, "", 1);
                $data_send = [
                    'menu_data'             => $menu_data
                ];
                $view->with($data_send);
                //Cart Content
                 $cart_data = Cart::getContent();
                 $count_cart = $cart_data->count();
                 $view->with('cart_data', $cart_data);
                 $view->with('count_cart', $count_cart);
                 //Total Cart
                 // $cart_total = Cart::getSubTotal();
                 // $view->with('cart_total', $cart_total);
                $media = Media::orderBy('id','ASC')->get();
                  $view->with('media', $media);
                

            });
    }
}
