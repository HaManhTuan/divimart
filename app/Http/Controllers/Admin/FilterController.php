<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\ProductAttr;
use App\ProductSize;
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
    $tuan = OrderDetail::with('product')->whereMonth('created_at',$req->time)
    ->selectRaw('product_id, COUNT(*) as count')
    ->selectRaw("size")
    ->groupBy('product_id','size')
    ->paginate(5); 
  
      $count = [];
      $product_name = [];
      $sttchar = [];
      $stt = 1;
      foreach ($tuan as $key => $value) {
        $product_name [] = Product::where('id',$value->product_id)->value('name');
        $count [] = $value['count'];
        $sttchar [] = $stt++;
      }
      $data_table =""; 
      $data_table .='<a class="btn btn-primary detail-list" style="position: absolute;right: 90px;top: 0px;display: block;" href="'.url('admin/thong-ke/filter-time/').'/'.''.$req->time.'">Chi tiết</a>';
      $data_table .= '<table class="table table-bordered" style="width: 70%; margin: 50px auto;">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên sản phẩm</th>
                          <th>Số lượt mua</th>
                          <th>Tháng</th>
                        </tr>
                      </thead>
                      ';
      $stt1 = 0;
      foreach ($tuan as $key => $value) {
        $stt1++;
         $product_name = Product::where('id',$value->product_id)->value('name');
         $product_size = ProductSize::where('id',$value->size)->value('size');
         $data_table .= '
              <tr>
                <td>'.$stt1.'</td>
                <td>'.$product_name.' Size: '.$product_size.'</td>
                <td>'.$value['count'].'</td>
                <td>'.$req->time.'</td>
              </tr>
           ';
      }
      $data_table .= '</table>'; 
      if ($tuan) {
        $msg = array(
          'status' => '_success',
          'msg'    => 'Thành công.',
          'data_table'    => $data_table,
          'count'    => $count,
          'stt'    => $sttchar,
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
  public function filtertime($time){
    $current_month = Carbon::now()->month;
    $tuan = OrderDetail::with('product')->whereMonth('created_at',$time)
    ->selectRaw('product_id, COUNT(*) as count')
    ->selectRaw("size")
    ->groupBy('product_id','size')
    ->get(); 
    $data_send = ['tuan' => $tuan, 'time' => $time];
    return view('admin/filter/filter_time')->with($data_send);
  }
  public function filterinventory(){
    $product_data = ProductAttr::with('product')->with('size')->get();
    return view('admin.filter.inventory', compact('product_data', $product_data));
  }
}
