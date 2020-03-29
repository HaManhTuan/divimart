<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Config;
use Illuminate\Support\Str;
class ConfigController extends Controller
{
    public function view(){
    	$config = Config::find(1);
    	return view('admin.config',compact('config'));
    }
    public function edit(Request $req)
    {   $request = $req->all();
		if ($req->hasFile('logo')) {
		$file  = $req->file('logo');
		$name  = $file->getClientOriginalName();
		$image = Str::random(4)."_".$name;
		while (file_exists("public/uploads/images/config/".$image)) {
		$image = Str::random(4)."_".$name;
		}
		$file->move("public/uploads/images/config", $image);
		$request['logo'] = $image;

		 unlink("public/uploads/images/config/".$req->logo_old);


		} else {
		$request['logo'] = $req->logo_old;
		}
	    if ($req->hasFile('icon')) {
		$file  = $req->file('icon');
		$name  = $file->getClientOriginalName();
		$image = Str::random(4)."_".$name;
		while (file_exists("public/uploads/images/config/".$image)) {
		$image = Str::random(4)."_".$name;
		}
		$file->move("public/uploads/images/config", $image);
		$request['icon'] = $image;
		unlink("public/uploads/images/config/".$req->icon_old);
		} else {
		$request['icon'] = $req->icon_old;
		}
    	$config = Config::find(1);
    	$config->img_logo = $request['logo'];
    	$config->icon = $request['icon'];
    	$config->email = $request['email'];
    	$config->address = $request['address'];
    	$config->phone = $request['phone'];
    	$config->title = $request['title'];
    	$config->description = $request['description'];
    	$query = $config->save();
    	if ($query) {
    		return redirect('admin/config/view-config')->with('flash_message_success', 'Sửa thành công');
    	}
    	else {
    		return redirect('admin/config/view-config')->with('flash_message_error', 'Có lỗi xảy ra. Vui lòng thử lại');
    	}
    }
}
