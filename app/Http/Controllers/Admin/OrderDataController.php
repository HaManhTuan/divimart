<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Customers;
use App\Coupon;
use App\Order;
use App\ProductAttr;
use App\AdminLog;
use App\AdminHis;
use Illuminate\Http\Request;
use DB;
use Auth;
use Mail;
use App\Mail\MailNotify;

class OrderDataController extends Controller {
	 function index(Request $request){
 	// if(request()->ajax())
  //    {
  //     if(!empty($request->from_date))
  //     {

  //        print_r($data->from_date);
  //        die();
  //      // $data = DB::table('tbl_order')
  //      //   ->whereBetween('order_date', array($request->from_date, $request->to_date))
  //      //   ->get();
  //     }
  //     else
  //     {
  //      $data = DB::table('tbl_order')
  //        ->get();
  //     }
  //     return datatables()->of($data)->make(true);
  //    }
		$orders = Order::with('orders')->get();
		 return view('admin.order.list')->with(compact('orders'));
	}
}
