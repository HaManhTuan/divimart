<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Category;
use App\ProductAttr;
use App\ProductSize;
use App\ProductImg;
use App\Contact;
use Session;
use DB;
class HomeController extends Controller
{
    public function index(){
        $categoryother = Category::where('parent_id','!=',0)->paginate(5);
        $dataProduct = Product::orderBy('buy_count','DESC')->inRandomOrder()->paginate(8);
        $idin      = [];
        $producBestSaler = Product::where('status',1)->orderBy('promotional_price','desc')->paginate(4);
        $producSaler = Product::where('status',1)->orderBy('promotional_price','desc')->get();
        $producNew = Product::where('status',1)->orderBy('created_at','asc')->get();
        $twoCategoryFirst = Category::where('parent_id','!=',0)->paginate(2);
        foreach ($twoCategoryFirst as $value) {
           if (in_array($value->id, $idin) == false) {
                $idin[] = $value->id;
            }
        }
        $twoCategoryProFirst = Category::with('products')->whereIn('id',$idin)->get();
        $data_send = [
        	'producBestSaler' => $producBestSaler,
        	'producSaler' => $producSaler,
        	'producNew' => $producNew,
            'categoryother' => $categoryother,
            'dataProduct' => $dataProduct,
            'twoCategoryProFirst' => $twoCategoryProFirst
        ];
    	return view('home.index')->with($data_send);
    }
    public function category(Request $req,$url){
        if (isset($url) && $url != '') {
            $categoryUrl = Category::where('url',$url)->first();
            $categorynoneUrl = Category::where('parent_id','!=',0)->where('id','!=',$categoryUrl->id)->get();
            $data      = $req->all();
            $idin      = [];
            $cate_data = Category::where('url', $url)->first();
            $idin[]    = $cate_data->id;
            $cate_in   = Category::where('parent_id', $cate_data->id)->get();
            foreach ($cate_in as $item) {
                if (in_array($item->id, $idin) == false) {
                    $idin[] = $item->id;
                }
            }
            $proCate = Product::whereIn('category_id', $idin)->paginate(9);
            $data_send = [
                'categoryUrl' =>$categoryUrl,
                'categorynoneUrl' =>$categorynoneUrl,
                'proCate' =>$proCate,
            ];
            return view('home.category')->with($data_send);
        }
    }
    public function detail(Request $req, $url){
          $idsize         = [];
          $productUrl = Product::with('category')->where('url',$url)->first();
          DB::table('products')->where('id', $productUrl->id)->increment('count_view');
          $product_img    = ProductImg::where(['product_id' => $productUrl->id])->get();
          $sizeData = ProductAttr::with('size')->where('product_id', $productUrl->id)->get();
          $categorynoneUrl = Category::where('parent_id','!=',0)->get();
          $producSaler = Product::orderBy('promotional_price','desc')->paginate(4);
            foreach ($sizeData as $item) {
                if (in_array($item->size_id, $idsize) == false) {
                    $idsize[] = $item->size_id;
                }
            }
            $countsizename = ProductSize::whereIn('id', $idsize)->count();
            $sizename = ProductSize::with('size')->whereIn('id', $idsize)->get();
            $relatedProducts = Product::where('category_id','!=',$productUrl->category_id)->get();
            $products = Product::where('id','!=',$productUrl->id)->get();
              $data_send = [
                'productUrl' =>$productUrl,
                'categorynoneUrl' => $categorynoneUrl,
                'producSaler' => $producSaler,
                'sizename' => $sizename,
                'relatedProducts' => $relatedProducts,
                'products' => $products,
                'countsizename' => $countsizename,
                'product_img' => $product_img,
                'sizeData' => $sizeData,
            ];
         return view('home.detail')->with($data_send);
    }
    //account
    public function contact(){
        return view('home.contact');
    }
    public function contactpost(Request $req){
        $contact = new Contact();
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->subject = $req->sub;
        $contact->content = $req->content;
        if ($contact->save()) {
            $msg = array(
                'status' => '_success',
                'msg'    => 'Cảm ơn bạn đã liên hệ',
            );
            return json_encode($msg);
        }
        else {
            $msg = array(
                'status' => '_error',
                'msg'    => 'Có lỗi xảy ra. Vui lòng thử lại.',
            );
            return json_encode($msg);
        }
    }
     public function searchproduct(Request $req)
         {
            if ($req->isMethod('post')) {
                $data=$req->all();
                $search_product=$data['keyword'];
                $productsAll=Product::where('name','like','%'.$search_product.'%')->where('status',1)->paginate(12);
                return view('home.danhsachsp',compact('productsAll','search_product'));
            }
         }
    public function filterprice(Request $req){
            $url = $req->url;
            $categoryUrl = Category::where('url',$url)->first();
            $categorynoneUrl = Category::where('parent_id','!=',0)->where('id','!=',$categoryUrl->id)->get();
            $data      = $req->all();
            $idin      = [];
            $cate_data = Category::where('url', $url)->first();
            $idin[]    = $cate_data->id;
            $cate_in   = Category::where('parent_id', $cate_data->id)->get();
            foreach ($cate_in as $item) {
                if (in_array($item->id, $idin) == false) {
                    $idin[] = $item->id;
                }
            }
            $minPrice = $req->min_price;
            $maxPrice = $req->max_price;
            $cateID = $req->category_id;

            $proCate = Product::whereBetween('price',[$minPrice, $maxPrice])->paginate(9);
            $data_send = [
                'minPrice' =>$minPrice,
                'maxPrice' =>$maxPrice,
                'categoryUrl' =>$categoryUrl,
                'categorynoneUrl' =>$categorynoneUrl,
                'proCate' =>$proCate,
            ];
            return view('home.category-price')->with($data_send);
        
       
        
    }
}
