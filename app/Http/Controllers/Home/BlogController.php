<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function view(){
    	$dataBlog= Blog::orderBy('created_at','ASC')->get();
    	  return view('admin.blog.list',compact('dataBlog',$dataBlog));
    }
    public function add()
    {
    	return view('admin.blog.add');
    }
    public function addaction(Request $req){
    	$request = $req->all();
    	$request['name'] = $req->name;
    	$request['description'] = $req->description;
    	$request['content'] = $req->content;
    	$request['status']            = $req->has('status')? '1':'0';
		$target_save                  = "public/uploads/images/blogs/";

		if ($req->hasFile('file')) {
			$file  = $req->file('file');
			$name  = $file->getClientOriginalName();
			$image = Str::random(4)."_".$name;
			while (file_exists("public/uploads/images/blogs/".$image)) {
				$image = Str::random(4)."_".$name;
			}
			$file->move("public/uploads/images/blogs", $image);
			$request['img'] = $image;
		} else {
			$request['img'] = "";
		}
		$query = Blog::create($request);
		if (!$query) {
			$msg = array(
				'status' => "_error",
				'msg'    => "Có lỗi xảy ra. Vui lòng thử lại.",
			);
			return response()->json($msg);
		} else {
			$msg = array(
				'status' => "_success",
				'msg'    => "Bạn đã thêm mới 1 bài viết.",
			);
			return response()->json($msg);
		}
    }
    public function edit($id){
    	$idBlog= Blog::find($id);
    	return view('admin.blog.edit',compact('idBlog',$idBlog));
    }
    public function editaction(Request $req){
    	$blog_detail     = Blog::where(['id' => $req->blog_id])->first();
    	$request                      = $req->all();
		$request['name']              = $req->name;
		$request['description'] = $req->description;
    	$request['content'] = $req->content;
		$request['status']            = $req->has('status')? '1':'0';
		$target_save                  = "public/uploads/images/blogs/";
		if ($req->hasFile('file')) {
			$file  = $req->file('file');
			$name  = $file->getClientOriginalName();
			$image = Str::random(4)."_".$name;
			while (file_exists("public/uploads/images/blogs/".$image)) {
				$image = Str::random(4)."_".$name;
			}
			$file->move("public/uploads/images/blogs", $image);
			$request['img'] = $image;
			unlink("public/uploads/images/blogs/".$req->old_file);
		} else {
			$request['img'] = $req->old_file;
		}
		$query = $blog_detail->update($request);
		if (!$query) {
			$msg = array(
				'status' => "_error",
				'msg'    => "Có lỗi xảy ra. Vui lòng thử lại.",
			);
			return response()->json($msg);
		} else {
			$msg = array(
				'status' => "_success",
				'msg'    => "Cập nhật thành công",
			);
			return response()->json($msg);
		}
    }
    public function delete(Request $req) {
		$id          = $req->id;
		$blog_detail     = Blog::where(['id' => $req->id])->first();
		unlink('public/uploads/images/blogs/'.$blog_detail->img);
	
		if (Blog::destroy($id)) {

			$msg = array(
				'status' => '_success',
				'msg'    => 'Một mục đã được xóa',
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
	//Home Blog
	public function blog ()
	{
		$dataBlog = Blog::orderBy('created_at','ASC')->paginate(5);
		return view('home.blog.index',compact('dataBlog',$dataBlog));
	}
	public function blogdetail($id){
		$dataBlog = Blog::find($id);
		return view('home.blog.detail',compact('dataBlog',$dataBlog));
	}

}
