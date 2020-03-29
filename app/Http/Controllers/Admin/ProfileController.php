<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function view(){
    	return view('admin.account.view');
    }
    public function changepass(Request $req)
    {
        $pwd        = $req->retypeNewPwd;
        $pwd_bcrypt = Hash::make($pwd);
        $id         = $req->id;
        $query      = User::where("id", $id)->update(['password' => $pwd_bcrypt]);
        if (!$query || $query == false) {
            $msg = [
                'status' => '_error',
                'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại'
            ];
            return response()->json($msg);
        } else {
            Auth::logout();
            $msg = [
                'status' => '_success',
                'msg'    => 'Mật khẩu đã được thay đổi thành công'
            ];
            return response()->json($msg);
        }
    }
    public function editaccount(Request $req)
    {
        $query      = User::where("id", $req->user_id)->update(['name' => $req->name,'phone' =>$req->phone, 'address' =>$req->address,'gender' =>$req->gender,'born' =>$req->born]);
        if (!$query || $query == false) {
            $msg = [
                'status' => '_error',
                'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại'
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'status' => '_success',
                'msg'    => 'Sửa tài khoản thành công'
            ];
            return response()->json($msg);
        }
    }
    public function changeavatar(Request $req)
    {

        //print_r($req->all());
        $id = $req->id;
        $old_avatar = $req->old_avatar;
        $imageBase = $req->imageBase;
        $base64_str = substr($imageBase, strpos($imageBase, ",")+1);
        $image = base64_decode($base64_str);
        $image_name = date("Y-d-m-His-") .".png";
        $target_save = "public/uploads/account/";
        //print_r($image_name);
        if (file_put_contents($target_save .$image_name, $image)) {
            $user_data = User::where('id', $id)->select('id', 'avatar')->first();
            $user_data->avatar = 'uploads/account/' . $image_name;
            if ($user_data->save()) {
                if (isset($old_avatar) && $old_avatar !='') {
                     unlink("public/".$old_avatar);
                }
                $msg = array(
                    'status'            => '_success'
                );
                return response()->json($msg);
            } else {
                $msg = array(
                    'status'            => '_error',
                    'msg'               => "Có lỗi xảy ra. Vui lòng thử lại."
                );
                return response()->json($msg);
            }
        } else {
            $msg = array(
                'status'            => '_error',
                'msg'               => "Có lỗi xảy ra. Vui lòng thử lại."
            );
            return response()->json($msg);
        }
    }

}
