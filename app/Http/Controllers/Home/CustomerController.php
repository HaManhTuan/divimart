<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Customers;
use App\Order;
use App\Coupon;
use Auth;
use Hash;
use DB;
use Session;
use Illuminate\Http\Request;

class CustomerController extends Controller {
	public function loginfrm (){
		return view('home.login');
	}
	public function registerfrm(){
		return view('home.register');
	}
	public function register(Request $req) {
		return view('home.register');
	}
	public function login(Request $req) {
		if (Auth::guard('customers')->attempt(['email' => $req->email_login, 'password' => $req->password_login])) {
			$msg = [
				'status' => '_success',
				'msg'    => 'Loading .....'

			];
			return response()->json($msg);
		} else {
			$msg = [
				'status' => '_error',
				'msg'    => 'Tài khoản hoặc mật khẩu sai
				'
			];
			return response()->json($msg);
		}
	}
	public function registation(Request $req) {
		//print_r($req->all());
		$checkEmail = Customers::where('email', $req->email)->count();
		if ($checkEmail > 0) {
			$msg = [
				'status' => '_error',
				'msg'    => 'Email này đã tồn tại. Vui lòng nhập email khác
				'
			];
			return response()->json($msg);
		} else {
			$customer           = new Customers();
			$customer->name     = $req->name;
			$customer->email    = $req->email;
			$customer->address  = $req->address;
			$customer->phone    = $req->phone;
			$customer->coupon    = "";
			$customer->password = Hash::make($req->password);
			if ($customer->save()) {
				$msg = [
					'status' => '_success',
					'msg'    => 'Đăng kí tài khoản thành công
					'
				];
				return response()->json($msg);
			} else {
				$msg = [
					'status' => '_error',
					'msg'    => 'Lỗi
					'
				];
				return response()->json($msg);
			}
		}
	}
	public function registerlogin()
	{
		return view('home.registerlogin');
	}
	public function logout() {
		Session::flush();
		Auth::guard('customers')->logout();
		return redirect('/');
	}
	public function viewaccount(Request $req) {
		return view('home.account.account');
	}
	public function editaccount(Request $req) {
		if (Auth::guard('customers')->check()) {
			$idAccount              = Auth::guard('customers')->user()->id;
			$accountUpdate          = Customers::find($idAccount);
			$accountUpdate->name    = $req->name;
			$accountUpdate->address = $req->address;
			$accountUpdate->phone   = $req->phone;
			if ($accountUpdate->save()) {
				$msg = [
					'status'  => '_success',
					'name'    => $req->name,
					'address' => $req->address,
					'msg'     => 'Thay đổi tài khoản thành công
					'
				];
				return response()->json($msg);
			} else {
				$msg = [
					'status' => '_error',
					'msg'    => 'Lỗi
					'
				];
				return response()->json($msg);
			}

		}
	}
	public function editpassword(Request $req) {
		$pwd        = $req->retypeNewPwd;
		$pwd_bcrypt = Hash::make($pwd);
		$id         = $req->id;
		$query      = Customers::where("id", $id)->update(['password' => $pwd_bcrypt]);
		if (!$query || $query == false) {
			$msg = [
				'status' => '_error',
				'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại'
			];
			return response()->json($msg);
		} else {
			Auth::guard('customers')->logout();
			$msg = [
				'status' => '_success',
				'msg'    => 'Mật khẩu đã được thay đổi thành công'
			];
			return response()->json($msg);
		}
	}
	public function GetTableOrderDetail($id) {
		$orderDetails = Order::with('orders')->where('id', $id)->first();
		//$orderDetails = json_decode(json_encode($orderDetails));
		$data_table = "";
		$data_table .= '<table class="table table-bordered">
		<tr>
		<td>STT</td>
		<td>SP</td>
		<td>Size</td>
		<td>Giá</td>
		<td>SL</td>
		<td>TT</td>
		</tr>';
		$stt = 0;
		foreach ($orderDetails->orders as $orderDetails) {
			$size = DB::table('product_size')->where('id', $orderDetails['size'])->value('size');
			$stt++;
			$data_table .= '<tr>';
			$data_table .= '<td>'.$stt.'</td>';
			$data_table .= '<td>'.$orderDetails['product_name'].'</td>';
			$data_table .= '<td>'.$size.'</td>';
			$data_table .= '<td>'.number_format($orderDetails['price']).'</td>';
			$data_table .= '<td>'.$orderDetails['quantity'].'</td>';
			$data_table .= '<td>'.number_format($orderDetails['quantity']*$orderDetails['price']).'</td>';
			$data_table .= '</tr>';
		}
		$data_table .= '</table>';
		return $data_table;
	}
	public function historyorder(Request $req) {
		$customer_id = Auth::guard('customers')->user()->id;
		$order       = Order::with('orders')->where('customer_id', $customer_id)->orderBy('id', 'DESC')->get();
		return view('home.account.historyorder', compact('order'));
	}
	public function historyorderdetail(Request $req) {
		//$orderDetails = Order::with('orders')->where('id', $req->id)->first();
		$body = $this->GetTableOrderDetail($req->id);
		$msg  = [
			'body' => $body,
		];
		return response()->json($msg);
	}
	//Admin
	public function view()
	{
		$coupon = Coupon::get();
		$customer = Customers::orderBy('created_at','asc')->get();
		$data_send=[
			'customer'=>$customer,
			'coupon' => $coupon
		];
		return view('admin.customer.list')->with($data_send);
	}
}
