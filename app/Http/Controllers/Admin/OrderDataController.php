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
		$orders = Order::with('orders')->orderBy('id','asc')->get();
		 return view('admin.order.list')->with(compact('orders'));
	}
}
