<?php
namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\ImageProduct;
use App\Product;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller {
	private $_categories;

	function __construct() {
		$this->_categories = Category::all();
	}
	public function list() {
		$products = Product::with('image_product')->paginate(6);
		$categories = $this->_categories;
		return view('page.product.product', compact('products', 'categories'));

	}
	public function listbygroup($parent_alias, $alias) {

		$parent_id = Category::select('id')->where('alias', $parent_alias)->first();
		$parent_id = $parent_id->id;
		$id = Category::where(['alias' => $alias, 'parent_id' => $parent_id])->first();
		$categories = $this->_categories;
		if (!empty($id->id)) {

			$products = Product::where('category_id', $id->id)->paginate(6);
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
		return view('page.product.detail', compact('product', 'color', 'size', 'images'));
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
		$products =Product::whereIn('id',$product_id)->paginate(9);
		 $key= false;
		}
		
		
		return view('page.product.fill_size',compact('products','key'));
	}
	

	public function search(Request $request)
	{
			$keyword =$request->keyword;

	}

}
