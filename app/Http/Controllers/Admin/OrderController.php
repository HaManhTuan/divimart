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

class OrderController extends Controller {
	public function vieworder() {

		$orders = Order::with('orders')->get();
		return view('admin.order.list')->with(compact('orders'));
	}
	public function vieworderdetail(Request $req, $id) {
		$coupon = Coupon::get();
		$orderDetail    = Order::with('orders')->find($id);
		$customerDetail = Customers::find($orderDetail->customer_id);
		$adminLog = AdminLog::with('admin_Log')->where(['module' => 'edit-order','order_id' =>$id])->get();
		// echo '<pre>';
		// print_r($orderDetail->id);
		// echo '</pre>';die();
		$adminHis = AdminHis::with('admin_His')->where(['module' => 'ChangeStatusOrder','order_id' =>$id])->get();
		if (isset($customerDetail) && $customerDetail !='') {
			$data_send      = [
				'id'             => $id,
				'orderDetail'    => $orderDetail,
				'customerDetail' => $customerDetail,
				'adminLog' => $adminLog,
				'adminHis' => $adminHis,
				'coupon' => $coupon
			];
		}
		else {
			$data_send      = [
				'id'             => $id,
				'orderDetail'    => $orderDetail,
				'adminLog' => $adminLog,
				'adminHis' => $adminHis,
				'coupon' => $coupon
			];
		}

		return view('admin.order.view')->with($data_send);
	}
	public function changestatus(Request $req) {
		$orderStatus               = Order::with('orders')->find($req->order_id);
		$orderStatus->order_status = $req->status;
        switch ($req->status) {
            case '1':
                $content = 'Đã thay đổi trạng thái thành: Mới';
                break;
            case '2':
                $content = "Đã thay đổi trạng thái thành: Đang xử lý";
                break;
            case '3':
                $content = "Đã thay đổi trạng thái thành: Đang chuyển";
                break;
            case '4':
                $content = "Đã thay đổi trạng thái thành: Đã chuyển";
                break;
            case '5':
                $content = "Đã thay đổi trạng thái thành: Đã hủy";
                break;
        }
        $AdminHis = new AdminHis();
		$AdminHis->action = $content;
		$AdminHis->module = "ChangeStatusOrder";
		$AdminHis->admin_id = Auth::id();
		$AdminHis->order_id = $req->order_id;
		$AdminHis->save();
		if ($orderStatus->save()) {
			if ($orderStatus->order_status == 4) {
				DB::table('customers')->where('id',$req->customer_id)->update(['coupon' => '']);
				foreach ($orderStatus->orders as $value) {
					$decrementStock = DB::table('product_attr')->where(['product_id' => $value->product_id,'size_id' =>$value->size])->update(['stock' => DB::raw('stock-'.$value->quantity)]);
				}
				foreach ($orderStatus->orders as $value) {
					$incrementBuy = DB::table('products')->where(['id' => $value->product_id])->increment('buy_count',$value->quantity);
				}
				if ($decrementStock) {
					$msg = array(
						'status' => '_success',
						'msg'    => 'Bạn đã thay đổi trạng thái thành công.',
					);
					return json_encode($msg);
				}

			}
			else {
				$msg = array(
						'status' => '_success',
						'msg'    => 'Bạn đã thay đổi trạng thái thành công.',
					);
					return json_encode($msg);
				}
		
		} else {
			$msg = array(
				'status' => '_error',
				'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại.',
			);
			return json_encode($msg);
		}

	}
	public function changecustomer(Request $req) {

		$customer          = Customers::find($req->id_cus);
		$customer->name    = $req->name;
		$customer->phone   = $req->phone;
		$customer->address = $req->address;
		if ($customer->save()) {
			$msg = array(
				'status' => '_success',
				'msg'    => 'Bạn đã thay đổi thành công.',
			);
			return json_encode($msg);
		} else {
			$msg = array(
				'status' => '_error',
				'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại.',
			);
			return json_encode($msg);
		}

	}
	public function changeorder(Request $req) {
		$order          = Order::find($req->id_order);
		$order->name    = $req->name_order;
		$order->phone   = $req->phone_order;
		$order->address = $req->address_order;
		if ($order->save()) {

			$msg = array(
				'status' => '_success',
				'msg'    => 'Bạn đã thay đổi thành công.',
			);
			return json_encode($msg);
		} else {
			$msg = array(
				'status' => '_error',
				'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại.',
			);
			return json_encode($msg);
		}
	}
	public function log(Request $req){
		//print_r($req->all());
		$AdminLog = new AdminLog();
		$AdminLog->content = $req->comment;
		$AdminLog->module = $req->module;
		$AdminLog->admin_id = $req->admin_id;
		$AdminLog->order_id = $req->order_id;

		if ($AdminLog->save()) {

			$msg = array(
				'status' => '_success',
				'msg'    => 'Thành công.',
			);
			return json_encode($msg);
		} else {
			$msg = array(
				'status' => '_error',
				'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại.',
			);
			return json_encode($msg);
		}

	}
	public function filterdate(Request $req){

		$data = $req->all();
		if ($data['datefrom'] != '' && $data['dateto'] == '') {
			$filterDate = Order::with('orders')->where('updated_at', $data['datefrom'])->get();
		}
		else {
			if ($data['datefrom'] == '' && $data['dateto'] != '') {
				$filterDate = Order::with('orders')->where('updated_at', $data['dateto'])->get();
			}
			if ($data['datefrom'] != '' && $data['dateto'] != '') {
			    $filterDate = Order::with('orders')->whereBetween('updated_at', [$req->datefrom, $req->dateto])->get();
			}
			if ($data['datefrom'] == '' && $data['dateto'] == '') {
				$filterDate = Order::with('orders')->get();
			}
		}
		// print_r($data);
		// die();
		$data_table ="";
		$data_table .= '<table id="orders-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Thời gian</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Email</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>';
	
		foreach ($filterDate as $item) {
			$data_table .= '<tr>';
			$data_table .= '<td>'.$item['id'].'</td>';
			$data_table .= '<td>'.$item['created_at'].'</td>';
			$data_table .= '<td>'.$item['name'].'</td>';
			$data_table .= '<td>';
				foreach ($item->orders as $item1) {
						$data_table .= $item1['product_name'];
						 $size = DB::table('product_size')->where('id',$item1->size)->value('size');
						 $data_table .= 'Size: '.$size.' + ('.$item1['quantity'].')'.'<br>';
				}

			$data_table .= '</td>';
			$data_table .= '<td>'.$item['email'].'</td>';
			$data_table .= '<td>'.number_format($item['total_price']).'</td>';
			$data_table .= '<td>';
							if($item['order_status'] == 1){
							$data_table .= '<span class="badge badge-success" style="margin-left: 10px">Mới</span>';
							}
							else{
								if($item['order_status'] == 2){
								$data_table .='<span class="badge badge-primary" style="margin-left: 10px">Đang xử lý</span>';
								}
								if($item['order_status'] == 3){
									$data_table .='<span class="badge badge-warning" style="margin-left: 10px">Đang chuyển</span>';
								}
								if($item['order_status'] == 4){
									$data_table .='<span class="badge badge-info" style="margin-left: 10px">Đã chuyển</span>';
								}
								if($item['order_status'] == 5){
									$data_table .=' <span class="badge badge-danger" style="margin-left: 10px">Đã hủy</span>';
								}
							}                  
			$data_table .= '</td>';
			$data_table .= '<td><a href="view-orderdetail/'.$item->id.'">Chi tiết</a></td>';
			$data_table .= '</tr>';
		}
		$data_table .= '</table>';
		if ($filterDate) {
			$msg = array(
				'status' => '_success',
				'msg'    => 'Thành công.',
				'data_table'    => $data_table
				
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
	public function tkorder(){
		return view("admin.order.thongke");
	}
	public function sendmail(Request $req){
		$orderDetail    = Order::with('orders')->find($req->id);
		$email = $orderDetail->email;
		$data_send = ['orderDetail' => $orderDetail];
		if ( Mail::to($email)->send(new MailNotify())) {
		$msg = array(
			'status' => '_success',
			'msg'    => 'Bạn đã gửi mail.',	
		);
		return json_encode($msg);
		}

	}
	public function invoice($id){
		$orderDetail = Order::with('orders')->find($id);
		$data_send =['id' => $id,'orderDetail'=>$orderDetail];
		return view("admin.order.invoice")->with($data_send);
	}
	public function sendcoupon(Request $req){
		$query = DB::table('customers')->where('id',$req->customer_id)->update(['coupon' => $req->coupon]);	
		if ($query) {
			$msg = array(
				'status' => '_success',
				'msg'    => 'Bạn đã gửi 1 mã giảm giá cho khách hàng này.',	
			);
			return json_encode($msg);
		}
		else {
			$msg = array(
				'status' => '_error',
				'msg'    => 'Có lỗi.',	
			);
			return json_encode($msg);
		}
	}
}
