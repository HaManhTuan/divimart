<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Product;
use App\Category;
use App\ProductAttr;
use App\ProductSize;
use App\ProductImg;
use App\Customers;
use Cart;
use DB;
use Session;
use App\Order;
use App\OrderDetail;
use App\Coupon;
class CartController extends Controller
{
   public function addtocart(Request $req) 
   {
        $stock = ProductAttr::where(['size_id' => $req->sc, 'product_id' => $req->product_id])->sum('stock');
        if ($stock >= $req->quantity && $stock > 0) {
            Session::forget('CouponAmount');
            Session::forget('CouponCode');    
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
              $session_id = Str::random(30);
              Session::put('session_id', $session_id);
            }
            $nameSize = ProductSize::where('id',$req->sc)->value('size');
           Cart::add([
            'id'   => $req->product_id."-".$req->sc,
            'name' => $req->product_name,
            'price' => $req->price,
            'quantity' =>  $req->quantity,
            'attributes' => ['size' => $req->sc ,'avatar' =>$req->avatar,'url' =>$req->url,'session_id' =>$session_id,'note' =>$req->note,'product_id' =>$req->product_id]
            ]);
            $cart_data = Cart::getContent();
            $cart_subtotal = Cart::getSubTotal();
            $count_cart = $cart_data->count();
            $cartblock = '<a class="cart-link" href="'.url('cart/view-cart').'">
                <span class="title">Giỏ hàng</span>
                <span class="total">'.$cart_data->count().' sản phẩm - '.number_format($cart_subtotal).'</span>
                <span class="notify notify-left">'.$cart_data->count().'</span>
                </a>
                <div class="cart-block">
                  <div class="cart-block-content">
                    <h5 class="cart-title">'.$cart_data->count().' sản phẩm</h5>
                    <div class="cart-block-list">
                      <ul>';
                        foreach ($cart_data as $value) {
                            $cartblock .= '<li class="product-info">
                          <div class="p-left">
                            <a href="#" class="remove_link"></a>
                            <a href="#">
                            <img class="img-responsive" src="'.asset('public/uploads/images/products/').'/'.''.$value->attributes->avatar.'" alt="p10">
                            </a>
                          </div>
                          <div class="p-right">
                            <p class="p-name">'.$value['name'].'</p>
                            <p class="p-rice">'.number_format($value['price']).'</p>
                            <p>Qty: '.$value['quantity'].'</p>
                          </div>
                        </li>';
                        }
                      $cartblock .= '</ul>
                    </div>
                    <div class="toal-cart">
                      <span>Tổng cộng:</span>
                      <span class="toal-price pull-right">'.number_format($cart_subtotal).'</span>
                    </div>
                    <div class="cart-buttons">
                      <a href="" class="btn-check-out">Thanh toán</a>
                    </div>
                  </div>
                </div>';
            $success = 'Bạn đã thêm '.$req->product_name.' - size: '.$nameSize.'   vào giỏ hàng!';
            $error = "";
            $msg = [
            "status" =>"_success",
            "success"        => $success,
            "error"        => $error,
            "cartblock"        => $cartblock,
            "count_cart"        => $count_cart,
            ];
            return json_encode($msg);       
        }
        else
        {
            if (($stock < $req->quantity && $stock > 0)) {
            $msg = [
                'status' => '_error',
                'msg'    => 'Không đủ hàng. Vui lòng nhập lại số lượng'
            ];
            return response()->json($msg);
            }
            else {
              $msg = [
                'status' => '_error',
                'msg'    => 'Size này hiện tại đang hết hàng. Vui lòng chọn size khác'
            ];
            return response()->json($msg);
            }
        }
        
       //print_r($req->all());
   }
   public function couponcart(Request $req){
    Session::forget('CouponAmount');
    Session::forget('CouponCode');
    $counponCount = Coupon::where('coupon_code', $req->coupon_code)->count();
    if ($counponCount == 0) {
      $msg = [
        'status' => '_error',
        'msg'    => 'Mã giảm giá không tồn tại'
      ];
      return response()->json($msg);
    } else {
      $couponDetail = Coupon::where('coupon_code', $req->coupon_code)->first();
      $expiry_date  = $couponDetail->expiry_date;
      $current_date = date("d-m-Y");
      if ($expiry_date < $current_date) {
        $msg = [
          'status' => '_error',
          'msg'    => 'Mã giảm giá đã hết hạn'
        ];
        return response()->json($msg);
      }
      $session_id = Session::get('session_id');
      // if (Auth::guard('customers')->check()) {
      //   $user_email = Auth::guard('customers')->user()->email;
      // }
      $total_amount = 0;
      $cart_data = Cart::getContent();
      foreach ($cart_data as $item) {
        $total_amount = $total_amount+($item->price*$item->quantity);
      }
      if ($couponDetail->amount_type == "Fixed") {
        $counponAmount = $couponDetail->amount;
      } else {
        $counponAmount = $total_amount*($couponDetail->amount/100);
      }

      Session::put('CouponAmount', $counponAmount);
      Session::put('CouponCode', $req->coupon_code);

      $msg = [
        'status' => '_success',
        'msg'    => 'Thành công. Bạn đã được giảm giá'
      ];
      return response()->json($msg);
    }
   }
   public function checksizestock(Request $req){
    $stock = ProductAttr::where(['size_id' => $req->sizeid, 'product_id' => $req->product_id])->sum('stock');
        $size  = ProductSize::where(['id'      => $req->sizeid])->value('size');
        if ($stock >= $req->quantity && $stock > 0) {
            $msg = [
                'status' => '_success',
                'size'   => $size,
                'msg'    => 'Thanh cong'
            ];
            return response()->json($msg);
        } else {
            if (($stock < $req->quantity && $stock > 0)) {
                            $msg = [
                'status' => '_error',
                'msg'    => 'Không đủ hàng. Vui lòng nhập lại số lượng'
            ];
            return response()->json($msg);
            }
            else {
              $msg = [
                'status' => '_error',
                'msg'    => 'Size này hiện tại đang hết hàng. Vui lòng chọn size khác'
            ];
            return response()->json($msg);
            }

        }
   }
   public function viewcart()
   { 
    if (Auth::guard('customers')->check()) {
      $couponCus = Auth::guard('customers')->user()->coupon;
       $data_send= ['couponCus' => $couponCus];
      return view('home.cart')->with($data_send);
    }
    else {
       return view('home.cart');
    }
     
   } 
   public function updatecart(Request $req){
    // $cart_data = Cart::getContent();

    $stock = ProductAttr::where(['size_id' => $req->size, 'product_id' => $req->product_id])->value('stock');
    // print_r($stock);
    // die();
     if ($stock > $req->qty && $stock > 0) {
          Cart::update($req->product_id."-".$req->size,['quantity' => array(
            'relative' => false,
            'value' => $req->qty
          )]);
          $msg = [
                'status' => '_success',
                'msg'    => 'Cập nhật thành công'
          ];
        return response($msg);
     }
      else {
        $msg = [
                'status' => '_error',
                'qty_old' => $req->qty,
                'msg'    => 'Số lượng lớn quá. Hãy giảm số lượng'
            ];
        return response($msg);
      }


   }
  public function removecart(Request $req){
     Cart::remove($req->id);
   }
  public function viewcartstep2(){
    return view('home.cart.step2');
   }
  public function viewcartstep3(){
    return view('home.cart.step3');
  }
  public function finish(Request $req){
    // print_r(Session::get('CouponAmount'));
    // die();
    // Session::forget('CouponAmount');
    // Session::forget('CouponCode'); 
    $cart_data = Cart::getContent();
    $cart_subtotal = Cart::getSubTotal();
    if (Auth::guard('customers')->check()) {
     $customer= Customers::find(Auth::guard('customers')->user()->id);
     $customer->name    = $req->name_cus;
     $customer->phone   = $req->phone_cus;
     $customer->address = $req->address_cus;
     $customer->save();
    }
    if (Auth::guard('customers')->check()) {
      $customer_id = Auth::guard('customers')->user()->id;
    }
    else
    {
      $customer_id = "";
    }
    $order                = new Order();
    $order->customer_id   = $customer_id;
    $order->email         = $req->email_order;
    $order->total_price   = $cart_subtotal;
    $order->name          = $req->name_order;
    $order->phone         = $req->phone_order;
    $order->note          = $req->note;
    $order->address       = $req->address_order;
    $order->order_status  = '1';
    // print_r(Session('CouponCode'));
    // echo '<pre>';
    // print_r(Session('CouponAmount'));
    // die();
    if (!empty(Session('CouponAmount'))) {
      $order->coupon_code   = Session::get('CouponCode');
      $order->coupon_amount = Session::get('CouponAmount');
      $order->coupon_price = $cart_subtotal - Session::get('CouponAmount');
    }
    else {
      $order->coupon_code   = 0;
      $order->coupon_amount = 0;
      $order->coupon_price = $cart_subtotal;
    }

    if ($order->save()) {
      $order_id     = DB::getPdo()->lastInsertId();
      foreach ($cart_data as $value) {
        $orderdetail               = new OrderDetail();
        $orderdetail->order_id     = $order_id;
        $orderdetail->product_id   = $value->attributes->product_id;
        $orderdetail->customer_id  = $customer_id;
        $orderdetail->product_name = $value->name;
        $orderdetail->size         = $value->attributes->size;
        $orderdetail->price        = $value->price;
        $orderdetail->quantity     = $value->quantity;
        $query = $orderdetail->save();
      }
      if ($query) {

         return redirect('cart/thanks');
      }
    }
    //     print_r($order_id);
    // die();
  }  
  public function thank(){
    Cart::clear();
    Session::forget('CouponAmount');
    Session::forget('CouponCode'); 
    Session::forget('session_id');
    return view('home.cart.thanks');
  } 
}
