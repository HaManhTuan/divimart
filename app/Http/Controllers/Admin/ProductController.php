<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\ProductAttr;
use App\ProductColor;
use App\ProductImg;
use App\ProductSize;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller {
	public function viewpro() {
		$proExp = ProductAttr::with('product')->with('size')->where('stock','<=',2)->orderBy('stock','ASC')->get();
		$products             = Product::with('category')->orderBy('id', 'desc')->get();
		$product_status       = [];
		$product_class_status = [];
		foreach ($products as $key => $product) {

			$product_status[$key]       = parent::status_convert($product->status);
			$product_class_status[$key] = parent::status_format($product->status);

			$category_id    = $product->category_id;
			$category_name  = Category::where('id', $category_id)->value('name');
			$category[$key] = $category_name;

		}
		$size      = ProductSize::get();
		$data_send = [
			'products' => $products,
			//'category_name'         => $category,
			'product_status'       => $product_status,
			'product_class_status' => $product_class_status,
			'proExp' => $proExp,
			'size'                 => $size
		];
		// echo '<pre>';
		// print_r(json_decode(json_encode($products)));
		// echo '</pre>';
		// die();
		return view('admin.product.list')->with($data_send);
	}
	public function add() {
		$size      = ProductSize::get();
		$categoryController = new CategoryController();
		$data_select        = $categoryController->getDataSelect(0, '', '');
		$data_send          = [
			'categoryData' => $data_select,
			'size' => $size
		];
		return view('admin.product.add')->with($data_send);
	}
	public function addpro(Request $req) {
		$request = $req->all();
		//print_r($request);
		$request['name']              = $req->name;
		$request['url']               = $req->url;
		$request['category_id']       = $req->parent_id;
		$request['description']       = $req->description;
		$request['content']       = $req->content;
		$request['info']       = $req->info;
		$price                        = (int) preg_replace("/[\,\.]+/", "", $req->price);
		$promotional_price            = (int) preg_replace("/[\,\.]+/", "", $req->promotional_price);
		$request['sale']              = parent::sale($promotional_price, $price);
		$request['price']             = $price;
        $request['author_id']         = Auth::id();
		$request['promotional_price'] = $promotional_price;
		$request['color']             = $req->color;
		$request['count']             = $req->count;
		$request['status']            = $req->has('status')? '1':'0';
		$target_save                  = "public/uploads/images/products/";

		if ($req->hasFile('file')) {
			$file  = $req->file('file');
			$name  = $file->getClientOriginalName();
			$image = Str::random(4)."_".$name;
			while (file_exists("public/uploads/images/products/".$image)) {
				$image = Str::random(4)."_".$name;
			}
			$file->move("public/uploads/images/products", $image);
			$request['image'] = $image;
		} else {
			$request['image'] = "";
		}


		$query = Product::create($request);
		$product_id = Product::orderBy('id','DESC')->value('id');
		foreach ($request['size'] as $key => $val) {

			$size             = new ProductAttr();
			$size->size_id    = $val;
			$size->stock      = $request['stock'][$key];
			// $size->stock      = $request['count'];
			$size->product_id = $product_id;
			$query            = $size->save();
		}
		if (!$query) {
			$msg = array(
				'status' => "_error",
				'msg'    => "Có lỗi xảy ra. Vui lòng thử lại.",
			);
			return response()->json($msg);
		} else {
			$msg = array(
				'status' => "_success",
				'msg'    => "Sản phẩm của bạn đã được đăng.",
			);
			return response()->json($msg);
		}
	}
	public function delpro(Request $req) {
		$id          = $req->id;
		$img_product = ProductImg::where(['product_id' => $id])->get()->toArray();
		if (isset($img_product)) {
			$DeleteImages = ProductImg::where(['product_id' => $id])->delete();
			foreach ($img_product as $value) {
				unlink('public/uploads/images/products/'.$value['img']);
			}
		}
		$DelAttr = ProductAttr::where(['product_id' => $id])->delete();
		$avatar  = Product::where(['id'             => $id])->first();
		if ($avatar->image !="") {
				if (file_exists('public/uploads/images/products/'.$avatar->image)) {
			unlink('public/uploads/images/products/'.$avatar->image);
		}
		}


		if (Product::destroy($id)) {

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
	public function addimg(Request $req, $url) {
		$product_detail = Product::where(['url' => $url])->first();
		$id             = $product_detail->id;
		if ($req->isMethod('post')) {
			$data = $req->all();
			if ($req->hasFile('file')) {
				$files = $req->file('file');
				foreach ($files as $file) {
					// Upload Images after Resize
					$image     = new ProductImg();
					$extension = $file->getClientOriginalExtension();
					$fileName  = rand(111, 99999).'.'.$extension;
					$file->move("public/uploads/images/products", $fileName);
					$image->img        = $fileName;
					$image->product_id = $id;
					$image->save();
				}
			}
			return redirect('admin/product/add-image/'.$url)->with('flash_message_success', 'Ảnh sản phẩm đã được thêm');
		}
		$product_img = ProductImg::where(['product_id' => $id])->orderBy('id', 'DESC')->get();
		$data_send   = [
			'product_detail' => $product_detail,
			'product_img'    => $product_img
		];
		return view('admin.product.img')->with($data_send);
	}
	public function editpro(Request $req, $url) {
		$product_detail     = Product::where(['url' => $url])->first();
		$categoryController = new CategoryController();
		$data_select        = $categoryController->getDataSelect(0, '', $product_detail->category_id);
		$category_detail    = Category::where(['id' => $product_detail->category_id])->first();
		$category_name      = $category_detail->name;
		//$data_color         = $this->getDataColor($product_detail->color);
		$table_size = $this->GetTableSize($product_detail->id);
		$data_send          = [
			'product_detail' => $product_detail,
			'category_name'  => $category_name,
			'data_select'    => $data_select,
			'table_size'    => $table_size,
			//'data_color'     => $data_color
		];
		if ($req->isMethod('post')) {
			//print_r($req->all());
			$request                      = $req->all();
			$request['name']              = $req->name;
			$request['url']               = $req->url;
			$request['category_id']       = $req->parent_id;
			$request['description']       = $req->description;
			$request['content']      	  = $req->content;
			$request['infor']       	  = $req->infor;

			$price                        = (int) preg_replace("/[\,\.]+/", "", $req->price);
			$promotional_price            = (int) preg_replace("/[\,\.]+/", "", $req->promotional_price);
			$request['sale']              = parent::sale($promotional_price, $price);
			$request['price']             = $price;
			$request['promotional_price'] = $promotional_price;
			$request['color']             = $req->color;
			$request['count']             = $req->count;
			$request['status']            = $req->has('status')? '1':'0';
			$target_save                  = "public/uploads/images/products/";
			if ($req->hasFile('file')) {
				$file  = $req->file('file');
				$name  = $file->getClientOriginalName();
				$image = Str::random(4)."_".$name;
				while (file_exists("public/uploads/images/products/".$image)) {
					$image = Str::random(4)."_".$name;
				}
				$file->move("public/uploads/images/products", $image);
				$request['image'] = $image;
				if (isset($req->old_file) && $req->old_file != '') {
					unlink("public/uploads/images/products/".$req->old_file);
				}

			} else {
				$request['image'] = $req->old_file;
			}
			$request['author_id']         = Auth::id();
			$query = $product_detail->update($request);

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
		return view('admin.product.edit')->with($data_send);
	}
	public function deimg(Request $req) {
		$id         = $req->id;
		$length     = $req->length;
		$id_array   = explode(",", $id);
		$img_del_qr = ProductImg::whereIn('id', $id_array)->first();

		if (ProductImg::destroy($id_array)) {
			unlink("public/uploads/images/products/".$img_del_qr->img);
			$msg = [
				'status' => '_success',
				'msg'    => $length.' mục đã được xóa.'
			];
			return response()->json($msg);
		} else {
			$msg = [
				'status' => '_error',
				'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại.'
			];
			return response()->json($msg);
		}
	}
	/*Get table size*/
	public function GetTableSize($id) {
		$product_data = Product::with('attributes')->where(['id' => $id])->first();
		$size_data    = ProductAttr::where('product_id', $id)->get();
		$data_table   = "";
		$data_table .= '<table class="table table-bordered">
		<tr>
		<td>STT</td>
		<td>Size</td>
		<td>Stock</td>
		<td>Action</td>
		</tr>';
		$stt = 0;
		foreach ($product_data->attributes as $size_data) {
			$stt++;
			$name_size       = ProductSize::where(['id'         => $size_data['size_id']])->value('size');
			$stock_size_attr = ProductAttr::where(['product_id' => $id])->value('stock');
			$data_table .= '<tr>';
			$data_table .= '<td><input type="hidden" name="idAttr[]" value="'.$size_data['id'].'">'.$stt.'</td>';
			$data_table .= '<td>'.$name_size.'</td>';
			$data_table .= '<td><input type="text" name="stock[]" value="'.$size_data['stock'].'" style="width:50px;color:black;"></td>';
			$data_table .= '<td>
			<button data-id="'.$size_data['id'].'" class="btn btn-danger btn-del-size"><i class="fa fa-trash"></i></button>
			</td>';
			$data_table .= '</tr>';
		}
		$data_table .= '</table>';
		return $data_table;
	}
	public function modalsize(Request $req) {
		$id         = $req->id;
		$body       = $this->GetTableSize($req->id);
		$modal      = Product::find($id);
		$id_color   = $modal->color;
		//$color      = ProductColor::find($id_color);
		//$name_color = $color->color;
		if (isset($modal)) {
			$msg = [
				'status'     => '_success',
				'body'       => $body,
				'name'       => $modal->name,
				'color'      => $id_color,
				'product_id' => $modal->id,
				'stock'      => $modal->count,
			];
			return response()->json($msg);
		}
		if (isset($body)) {
			$msg = [
				'status' => '_success',
				'body'   => $body,
			];
			return response()->json($msg);
		}
	}
	public function addsize(Request $req) {
		$data = $req->all();

		foreach ($data['size'] as $key => $val) {
			if (!empty($val)) {
				$attrCountSize = ProductAttr::where(['size_id' => $val, 'product_id' => $data['product_id']])->count();
				if ($attrCountSize > 0) {
					$msg = [
						'status' => '_error',
						'msg'    => 'Size này đã thực sự tồn tại. Vui lòng chọn size khác'
					];
					return response()->json($msg);
				}
			}
			$size             = new ProductAttr();
			$size->size_id    = $val;
			$size->stock      = $data['stock'];
			$size->product_id = $data['product_id'];
			$query            = $size->save();
		}
		if ($query) {
			$msg = [
				'status' => '_success',
				'msg'    => 'Thêm size thành công'
			];
			return response()->json($msg);
		} else {
			$msg = [
				'status' => '_error',
				'msg'    => 'Size này đã thực sự tồn tại. Vui lòng nhập từ khác'
			];
			return response()->json($msg);
		}
	}
	public function updatesize(Request $req) {
		//print_r($req->all());
		$product_size        = ProductSize::find($req->id);
		$product_size->size  = $req->size;
		$product_size->stock = $req->stock;
		$query               = $product_size->save();
		if ($query) {
			$msg = [
				'status' => '_success',
				'msg'    => 'Update size thành công'
			];
			return response()->json($msg);
		} else {
			$msg = [
				'status' => '_error',
				'msg'    => 'Error'
			];
			return response()->json($msg);
		}
	}
	public function editstock(Request $req){
		$data = $req->all();
		foreach($data['idAttr'] as $key=> $attr){
             if(!empty($attr)){
		        if (ProductAttr::where(['id' => $data['idAttr'][$key]])->update(['stock' => $data['stock'][$key]])) {
						$msg = [
						'status' => '_success',
						'msg'    => 'Cập nhật thành công'
					];
					return response()->json($msg);
				}
				// else {
				// 	$msg = [
				// 		'status' => '_error',
				// 		'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại'
				// 	];
				// 	return response()->json($msg);
				// }
             }
         }
	}
	public function deletesize(Request $req){
		$query = ProductAttr::where('id', $req->id)->delete();
		if ($query) {
			$msg = [
				'status' => '_success',
				'msg'    => 'Xóa thành công'
			];
			return response()->json($msg);
		}
		else {
			$msg = [
				'status' => '_error',
				'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại'
			];
			return response()->json($msg);
		}
	}
	public function attributesize(Request $req) {
		$data_size = ProductSize::get();
		if ($req->isMethod('post')) {
			$data = $req->all();
			foreach ($data['size'] as $key => $val) {
				if (!empty($val)) {
					$attrCountSize = ProductSize::where(['size' => $val])->count();
					if ($attrCountSize > 0) {
						return redirect('admin/attribute/view-attribute-size')->with('flash_message_error', 'Size này đã tồn tại');
					}
				}
				$size       = new ProductSize();
				$size->size = $val;
				$query      = $size->save();
			}
			if ($query) {
				return redirect('admin/attribute/view-attribute-size')->with('flash_message_success', 'Thêm size thành công !');
				//return view("admin.attribute.size");
			}
		}
		$data_send = ['data_size' => $data_size];
		return view("admin.attribute.size")->with($data_send);
	}
	public function delattributesize(Request $req)
	{
		$size  = ProductSize::where(['id'      => $req->id])->delete();
		if ($size) {
				$msg = [
				'status' => '_success',
				'msg'    => 'Xóa thành công'
			];
			return response()->json($msg);
		}
		else {
			$msg = [
				'status' => '_error',
				'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại'
			];
			return response()->json($msg);
		}
	}
	public function stock(Request $req) {
		// print_r($req->all());
		// die();
		$stock = ProductAttr::where(['size_id' => $req->sizeid, 'product_id' => $req->product_id])->sum('stock');
		$size  = ProductSize::where(['id'      => $req->sizeid])->value('size');
		if ($stock > 0) {
			$msg = [
				'status' => '_success',
				'size'   => $size,
				'msg'    => 'Thanh cong'
			];
			return response()->json($msg);
		} else {
			$msg = [
				'status' => '_error',
				'msg'    => 'Size này hiện tại đang hết hàng. Vui lòng chọn size khác'
			];
			return response()->json($msg);
		}

	}
	public function stock_size(Request $req) {
		$stock = ProductAttr::where(['size_id' => $req->sizeid, 'product_id' => $req->product_id])->sum('stock');
		if ($req->qty > $stock) {
			$msg = [
				'status' => '_error',
				'msg'    => 'Size này không đủ số lượng. Vui lòng nhập số lượng ít hơn
				'
			];
			return response()->json($msg);
		}
		if ($req->qty < $stock) {
			$msg = [
				'status' => '_success',
				'msg'    => 'OK
				'
			];
			return response()->json($msg);
		}

	}
}
