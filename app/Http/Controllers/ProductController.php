<?php
namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\ImageProduct;
use App\Product;
use App\Size;
use App\FeedbackProduct;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
	private $_categories;

	function __construct() {
		$this->_categories = Category::all();
	}

	public function fill_price(Request $request)
	{
		$min =  $request->price_min;
		$max =   $request->price_max;
        $categories = $this->_categories;
		$products =Product::with('image_product')->whereBetween('unit_price',[$min,$max])->paginate(6);
		if (!$products->isEmpty()) {
				return view('page.product.product', compact('products', 'categories'));
			} else {
				$notfound = TRUE;
				return view('page.product.product', compact('notfound', 'categories'));
			}
	}
	public function typeproduct($alias)
	{   $categories = $this->_categories;
		if($alias==='new'){

         $products = Product::with('image_product')->where('status','=',2)->paginate(6);
		
		return view('page.product.product', compact('products', 'categories'));

		}elseif($alias==='sale'){

			$products =Product::where('promo_price','!=',0)->paginate(6);
			if (!$products->isEmpty()) {
				return view('page.product.product', compact('products', 'categories'));
			} else {
				$notfound = TRUE;
				return view('page.product.product', compact('notfound', 'categories'));
			}

		}elseif($alias==='top'){
              $max =  DB::table('orderdetail')->selectRaw('product_id')->groupBy('product_id')->orderByRaw('COUNT(*) DESC')->limit(10)->get();
         $id =array();
         foreach ($max as $value) {
             array_push($id, $value->product_id);
            }
      
        $products = Product::with('image_product')->whereIn('id', $id )->where('status','<>','0')->paginate(6);
        return view('page.product.product', compact('products', 'categories'));

		}else{
			return view('page.404.404');
		}
	}
	public function list() {
		$products = Product::with('image_product')->where('status','<>','0')->paginate(6);
		$categories = $this->_categories;
		return view('page.product.product', compact('products', 'categories'));

	}
	public function listbygroup($parent_alias, $alias) {

		$parent_id = Category::select('id')->where('alias', $parent_alias)->first();
		if(!$parent_id ){
             $notfound = TRUE;
			return view('page.product.product', compact('notfound', 'categories'));
		}else{


		$parent_id = $parent_id->id;
		$id = Category::where(['alias' => $alias, 'parent_id' => $parent_id])->first();
		$categories = $this->_categories;
		if (!empty($id->id)) {

			$products = Product::where('category_id', $id->id)->where('status','<>','0')->paginate(6);
			if (!$products->isEmpty()) {
				return view('page.product.product', compact('products', 'categories'));
			} else {
				$notfound = TRUE;
				return view('page.product.product', compact('notfound', 'categories'));
			}
		} else {
			$notfound = TRUE;
			return view('page.product.product', compact('notfound', 'categories'));
		}
		}

	}
	public function quickview(Request $request) {
		if ($request->isMethod('post')) {
			$id = $request->id;
			$detail = Product::with(['color', 'size', 'image_product'])->where('id', '=', $id)->get();
			return view('page.product.detailajax', compact('detail'));
		}

	}
	public function detailproduct($alias, $id) {
		$product = Product::where([['alias', '=', $alias], ['id', '=', $id]])->get();
		$color = Color::where('product_id', '=', $id)->get();
		$size = Size::where('product_id', '=', $id)->get();
		$images = ImageProduct::where('product_id', '=', $id)->get();
		$comments = FeedbackProduct::where('product_id','=',$id)->orderBy('created')->paginate(8);
		return view('page.product.detail', compact('product', 'color', 'size', 'images','comments'));
	}

	public function fill_size(Request $request)
	{
		$data =$request->data;
		if(empty($data))
		{
         $products =Product::paginate(9);
         $products->withPath('san-pham');
         $key= true;
		}else{
	    $product_id = Size::select('product_id')->whereIn('size',$data)->get();
		$products =Product::whereIn('id',$product_id)->where('status','<>','0')->paginate(9);
		 $key= false;
		}
		
		
		return view('page.product.fill_size',compact('products','key'));
	}
	

	public function search(Request $request)
	{
			$keyword =$request->keyword;

      $products = Product::where('product_name', 'like', '%'.$keyword.'%')->orWhere('producer', 'like','%'.$keyword.'%')->get();
      return view('page.product.result',compact('products'));

	}

    
    public function review(Request $request)
    {

    	$fbp = new FeedbackProduct;
    	$fbp->user_id=$request->user_id ;
    	$fbp->product_id= $request->product_id;
    	$fbp->vote= $request->vote;
    	$fbp->comment=$request->comment;
    	$fbp->created= date('Y/m/d');
    	if($fbp->save())
    	{
    		return back()->with('msg','Thêm thành công');
    	}else
    	{
    		return back()->with('msg','Thêm nhận xét thất bại, thử lại');
    	}
    }
}
