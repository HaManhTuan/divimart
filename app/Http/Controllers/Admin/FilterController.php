<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\ProductAttr;
use App\Order;
use App\OrderDetail;
use App\Customers;
use App\Coupon;
use Hash;
use DB;
use Carbon\Carbon;

class FilterController extends Controller
{
  public function sanpham()
  {
    return view('admin.filter.filter');
  }
  public function filter(Request $req){
    $current_month = Carbon::now()->month;
    $tuan = OrderDetail::with('product')->selectRaw('product_id, COUNT(*) as count')
      ->groupBy('product_id')
      ->orderBy('count', 'desc')
       ->whereMonth('created_at',$req->time)
      ->get(); 
      $count = [];
      foreach ($tuan as $key => $value) {
        $count [] = $value['count'];
      }


      $data_table =""; 
      $data_table = '<table class="table table-bordered" style="width: 70%; margin: 50px auto;">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên sản phẩm</th>
                          <th>Số lượt mua</th>
                        </tr>
                      </thead>
                      ';
                $stt = 0;
                foreach ($tuan as $key => $value) {
                  $stt++;
                   $product_name = Product::where('id',$value['product_id'])->value('name');
                   $data_table .= '
                        <tr>
                          <td>'.$stt.'</td>
                          <td>'.$product_name.'</td>
                          <td>'.$value['count'].'</td>
                        </tr>
                     ';
                }
                $data_table .= '
              </table>'; 
    if ($tuan) {
      $msg = array(
        'status' => '_success',
        'msg'    => 'Thành công.',
        'data_table'    => $data_table,
        'count'    => $count,
        
        
      );
      return json_encode($msg);
    } else {
      $msg = array(
        'status' => '_error',
        'msg'    => 'Lỗi.',
      );
      return json_encode($msg);
    }
   
  }
}
