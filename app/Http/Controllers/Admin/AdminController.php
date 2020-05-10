<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\ProductAttr;
use App\Order;
use App\Customers;
use App\Coupon;
use Hash;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
  public function login()
   {
   	return view('admin.login');
   }
  public function dangnhap(Request $req){
   	    $data = $req->all();
    	  if (Auth::attempt(['email' =>$data['email'], 'password' => $data['password'], 'admin' => '1'])) {
                $msg = [
					'status' => '_success',
					'msg'    => 'Loading ...'
				];
				return response()->json($msg);
    	  }
    	  else {
    	  	    $msg = [
					'status' => '_error',
					'msg'    => 'Tài khoản hoặc mật khẩu sai
					'
				];
				return response()->json($msg);
    	  }
   }
  public function dashboard()
  {
      //Sản phẩm sắp hết hàng
      $proExp = ProductAttr::with('product')->with('size')->where('stock','<=',2)->orderBy('stock','ASC')->get();
      // echo '<pre>';
      // print_r($proExp);
      // echo '</pre>';
      //Top sản phẩm xem nhiều nhất
      $promostView = Product::orderBy('count_view','DESC')->paginate(5);
      //Top sản phẩm mua nhiều nhất
      $promostBuy = Product::orderBy('buy_count','DESC')->paginate(5);
      $yesterday=Carbon::yesterday()->toDateString();
      $range=  Carbon::now()->toDateString();
      // print_r($range);
      // die();
      $ngay = DB::table('orders')->where('updated_at',$range)->get();
      //Đơn hàng mới hôm nay
      $countOrderNewToday = DB::table('orders')->whereDate('updated_at',$range)->where('order_status',1)->count();
      //Tổng số đơn hàng mới hôm nay
      $dataOrderNewToday = Order::with('orders')->where(['updated_at' => $range,'order_status' => 1])->get();
      //Đơn hàng đang chuyển hôm nay
      $countOrderTransToday = DB::table('orders')->where(['updated_at' => $range,'order_status' => 3])->count();
      //Tổng số đơn hàng đang chuyển hôm nay
      $dataOrderTransToday = Order::with('orders')->where(['updated_at' => $range,'order_status' => 3])->get();
      //Đơn hàng bị hủy hôm nay
      $countOrderCancellToday = Order::with('orders')->where(['updated_at' => $range,'order_status' => 5])->count();
      //Đơn hàng đã chuyển hôm nay
      $countOrderSucessToday = Order::with('orders')->where(['updated_at' => $range,'order_status' => 4])->count();
      //Tổng số đơn hàng đã chuyển ngày hôm nay
      $dataOrderSucessToday = Order::with('orders')->where(['updated_at' => $range,'order_status' => 4])->get();
      // print_r($tien_ngay);
      // die();
      //Tổng số đơn hàng hôm nay
      $numberOrderToday = DB::table('orders')->where(['updated_at' => $range])->count();
      //Tổng doanh thu hôm nay
      $revenueOrderToday = DB::table('orders')->whereDate('updated_at',$range)->where('order_status', 4)->sum('coupon_price');
      //Tổng doanh thu hôm qua
      $revenueOrderYesterday = DB::table('orders')->whereDate('updated_at',$yesterday)->where(['order_status' => 4])->sum('coupon_price');
      //Tổng doanh thu
      $revenueOrder = DB::table('orders')->where(['order_status' => 4])->sum('coupon_price');
      //Số lượng sản phẩm
      $countProduct = Product::orderBy('created_at','asc')->count();
      //Số lượng khách hàng
      $countCustomer = Customers::orderBy('created_at','asc')->count();
      //Số lượng đơn hàng thành công
      $countOrderSucess = Order::where('order_status',4)->orderBy('created_at','asc')->count();
      //Số lượng người dùng
      $countUser = User::orderBy('created_at','asc')->count();
      $perUser = ($countUser/50)*100;
      //Tất cả đơn hàng thành công
      $countOrderFinish = Order::where('order_status',4)->count();
      //Tất cả đơn hàng đã bị hủy
      $countOrderCancell = Order::where('order_status',5)->count();
      //Số lượng mã giảm giá
      $countCoupon = Coupon::orderBy('created_at','asc')->count();
      //Tất cả đơn hàng mới(Chưa xử lý)
      $ordersNews = Order::with('orders')->where('order_status',1)->get();
      //Đơn hàng cần xử lý
      $ordersWork = Order::with('orders')->where('order_status','!=',1)->where('order_status','!=',4)->get();
      //Tất cả đơn hàng đang vận chuyển
      $ordersTrans = Order::with('orders')->where('order_status',3)->get();
      //Chart-Order-Quater
      $current_month_order = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->count();
      $last_month_order = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->subMonth(1))->count();
      $last_to_last_month_order = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->subMonth(2))->count();
      //Chart-revenue-quater
      $current_month_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->sum('coupon_price');
      $last_month_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->subMonth(1))->sum('coupon_price');
      $last_to_last_month_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->subMonth(2))->sum('coupon_price');
      //Chart-Order-Week
      $current_day_order_week = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->day)->count();
      $yesterday_day_order_week = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(1))->count();
      $yesterday_day_2_order_week = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(2))->count();
      $yesterday_day_3_order_week = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(3))->count();
      $yesterday_day_4_order_week = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(4))->count();
      $yesterday_day_5_order_week = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(5))->count();
      $yesterday_day_6_order_week = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(6))->count();
      //Chart-revenue-Week
      $current_month_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->sum('coupon_price');
      $current_day_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->day)->sum('coupon_price');
      $yesterday_day_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(1))->sum('coupon_price');
      $yesterday_day_2_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(2))->sum('coupon_price');
      $yesterday_day_3_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(3))->sum('coupon_price');
      $yesterday_day_4_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(4))->sum('coupon_price');
      $yesterday_day_5_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(5))->sum('coupon_price');
      $yesterday_day_6_order_revenue = Order::whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at',Carbon::now()->month)->whereDay('updated_at',Carbon::now()->subDay(6))->sum('coupon_price');
      //       print_r(Carbon::now()->subDay(1));
      // die();
      $data_send = [
        'proExp' => $proExp,
        'promostView' => $promostView,
        'promostBuy' => $promostBuy,
        'countProduct' => $countProduct,
        'countCustomer' => $countCustomer,
        'perUser' => $perUser,
        'countOrderSucess' => $countOrderSucess,
        'countUser' => $countUser,
        'countOrderFinish' => $countOrderFinish,
        'countOrderCancell' => $countOrderCancell,
        'countCoupon' => $countCoupon,
        'ordersNews' => $ordersNews,
        'ordersWork' => $ordersWork,
        'ordersTrans' => $ordersTrans,
        'countOrderCancellToday' => $countOrderCancellToday,
        'numberOrderToday' => $numberOrderToday,
        'countOrderNewToday' => $countOrderNewToday,
        'countOrderTransToday' => $countOrderTransToday,
        'countOrderSucessToday' => $countOrderSucessToday,
        'revenueOrderToday' => $revenueOrderToday,
        'revenueOrder' => $revenueOrder,
        'revenueOrderYesterday' => $revenueOrderYesterday,
        'dataOrderNewToday' => $dataOrderNewToday,
        'dataOrderTransToday' => $dataOrderTransToday,
        'dataOrderSucessToday' => $dataOrderSucessToday,
        'current_month_order' => $current_month_order,
        'last_month_order' => $last_month_order,
        'last_to_last_month_order' => $last_to_last_month_order,
        'current_month_order_revenue' => $current_month_order_revenue,
        'last_month_order_revenue' => $last_month_order_revenue,
        'last_to_last_month_order_revenue' => $last_to_last_month_order_revenue,
        'current_day_order_week' => $current_day_order_week,
        'yesterday_day_order_week' => $yesterday_day_order_week,
        'yesterday_day_2_order_week' => $yesterday_day_2_order_week,
        'yesterday_day_3_order_week' => $yesterday_day_3_order_week,
        'yesterday_day_4_order_week' => $yesterday_day_4_order_week,
        'yesterday_day_5_order_week' => $yesterday_day_5_order_week,
        'yesterday_day_6_order_week' => $yesterday_day_6_order_week,
        'current_day_order_revenue' => $current_day_order_revenue,
        'yesterday_day_order_revenue' => $yesterday_day_order_revenue,
        'yesterday_day_2_order_revenue' => $yesterday_day_2_order_revenue,
        'yesterday_day_3_order_revenue' => $yesterday_day_3_order_revenue,
        'yesterday_day_4_order_revenue' => $yesterday_day_4_order_revenue,
        'yesterday_day_5_order_revenue' => $yesterday_day_5_order_revenue,
        'yesterday_day_6_order_revenue' => $yesterday_day_6_order_revenue,
      ];
      return view("admin.dashboard")->with($data_send);
  }
      public function view()
    {
        $admin_data = User::get();
        $data_send = ['admin_data' => $admin_data];
        return view('admin.user.list')->with($data_send);
    }
    public function add(Request $req){
        $type = trim($req->type);
        $checkEmail = User::where('email', $req->email)->count();
        if ($checkEmail > 0) {
                $msg = [
                    'status' => '_error',
                    'msg'    => 'Email đã tồn tại. Vui lòng nhập email khác
                    '
                ];
                return response()->json($msg);
        }
        else {
            $user = new User();
            if ($type=trim("Admin")) {
               $user->name = $req->name;
               $user->email = $req->email;
               $user->type = $req->type;
               $user->password = Hash::make($req->password);
                $user->category_access = 1;
                $user->product_access = 1;
                $user->order_access = 1;
                $user->store_access = 1;
                $user->config_access = 1;
                $user->customer_access = 1;
                $user->user_access = 1;
                $user->admin           = $req->has('admin')? '1':'0';
                $user->save();
                $msg = [
                    'status' => '_success',
                    'msg'    => 'Bạn đã thêm 1 tài khoản mới'
                ];
                return response()->json($msg);
            }
            else {
                 if ($type=trim("User")) {
                    if (empty($req->category_access)) {
                        $req->category_access = 0;
                    }
                      if (empty($req->product_access)) {
                        $req->product_access = 0;
                    }
                      if (empty($req->order_access)) {
                        $req->order_access = 0;
                    }
                      if (empty($req->store_access)) {
                        $req->store_access = 0;
                    }
                      if (empty($req->config_access)) {
                        $req->config_access = 0;
                    }
                      if (empty($req->customer_access)) {
                        $req->customer_access = 0;
                    }
                      if (empty($req->user_access)) {
                        $req->user_access = 0;
                    }
                   $user->name = $req->name;
                   $user->email = $req->email;
                   $user->type = $req->type;
                   $user->admin  = $req->has('admin')? '1':'0';
                   $user->password = Hash::make($req->password);
                   $user->category_access = $req->category_access;
                   $user->product_access = $req->product_access;
                   $user->order_access = $req->order_access;
                   $user->store_access = $req->store_access;
                   $user->config_access = $req->config_access;
                   $user->customer_access = $req->customer_access;
                   $user->user_access = $req->user_access;
                   $user->born = '';
                   $user->gender = '';
                   $user->avatar = '';
                   $user->save();
                $msg = [
                    'status' => '_success',
                    'msg'    => 'Bạn đã thêm 1 tài khoản mới'
                ];
                return response()->json($msg);
                 }
             }
        }
    }
    public function edit($id){
      $userID = User::find($id);
      return view('admin.user.edit', compact('userID',$userID));
    }
    public function postedit(Request $req){
      $user = User::where('id',$req->id)->first();
      if ($req->type="User") {
        if (empty($req->category_access)) {
            $req->category_access = 0;
        }
          if (empty($req->product_access)) {
            $req->product_access = 0;
        }
          if (empty($req->order_access)) {
            $req->order_access = 0;
        }
          if (empty($req->store_access)) {
            $req->store_access = 0;
        }
          if (empty($req->config_access)) {
            $req->config_access = 0;
        }
          if (empty($req->customer_access)) {
            $req->customer_access = 0;
        }
          if (empty($req->user_access)) {
            $req->user_access = 0;
        }
         $user->name = $req->name;
         $user->admin  = $req->has('admin')? '1':'0';
         $user->category_access = $req->category_access;
         $user->product_access = $req->product_access;
         $user->order_access = $req->order_access;
         $user->store_access = $req->store_access;
         $user->config_access = $req->config_access;
         $user->customer_access = $req->customer_access;
         $user->user_access = $req->user_access;
         $user->save();
          $msg = [
              'status' => '_success',
              'msg'    => 'Bạn đã sửa 1 tài khoản'
          ];
          return response()->json($msg);
      }
      else {
        $user->name = $req->name;
        $user->admin  = $req->has('admin')? '1':'0';
        $user->save();
        $msg = [
            'status' => '_success',
            'msg'    => 'Bạn đã sửa 1 tài khoản'
        ];
        return response()->json($msg);
      }
    }
    public function resetpass(Request $req){
      $user = User::where('id',$req->id)->first();
      $user->password = Hash::make($req->password);
      $user->save();
        $msg = [
            'status' => '_success',
            'msg'    => 'Bạn đã reset 1 tài khoản'
        ];
      return response()->json($msg);
    }
      public function delete(Request $req) {
    $id     = $req->id;
    $length = $req->length;
    $coupon = User::where(['id' => $id])->get();
    if (User::destroy($id)) {
      $msg = array(
        'status' => '_success',
        'msg'    => $length.' mục đã được xóa',
      );
      return json_encode($msg);
    } else {
      $msg = array(
        'status' => '_error',
        'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại',
      );
      return json_encode($msg);
    }
  }
    public function logout(){
      Auth::logout();
      return redirect('admin/login');
    }
}
