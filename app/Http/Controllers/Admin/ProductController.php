<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Color;
use App\Http\Controllers\Controller;
use App\ImageProduct;
use App\Product;
use App\Size;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$category = Category::all();
		$products = Product::paginate(8);
		return view('admin.product.index', compact('category', 'products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$product_name = $request->product_name;
		$category = $request->category_product;
		$color = $request->color;
		$size = $request->size;
		$amount = $request->amount;
		$unit_price = $request->unit_price;
		$promo_price = $request->promo_price;
		$producer = $request->producer;
		$status = $request['radio-group'];
		$content = $request->content;
		$md = $request->metades;
		$mk = $request->metakey;
		$photos = $request->file('file');

		if(empty($photos))
			return redirect()->back()->with(['notify' => 'error', 'mss' => "Ảnh không được bỏ trống"]);

//product
		$product = new Product;
		$product->product_name = $product_name;
		$product->alias = vn_to_str($product_name);
		$product->category_id = $category;
		$product->unit_price = $unit_price;
		$product->promo_price = empty($promo_price) ? 0 : $promo_price;
		$product->producer = $producer;
		$product->amount = $amount;
		$product->describe = $content;
		$product->meta_keyword = $mk;
		$product->meta_describe = $md;
		$product->status = $status;
		$product->created = date('Y/m/d');

		if ($product->save()) {

			foreach ($color as $cl) {
				$m = new Color;
				$m->product_id = $product->id;
				$m->color = $cl;
				$m->save();
			}
			foreach ($size as $sz) {
				$c = new Size;
				$c->product_id = $product->id;
				$c->size = $sz;
				$c->save();
			}

			if (!is_array($photos)) {
				$photos = [$photos];
			}

			for ($i = 0; $i < count($photos); $i++) {
				$photo = $photos[$i];

				$name = sha1(date('YmdHis') . str_random(30));
				$save_name = $name . '.' . $photo->getClientOriginalExtension();
				$photo->move('public/uploads/product/', $save_name);
				$ip = new ImageProduct();
				$ip->product_id = $product->id;
				$ip->link = null;
				$ip->image = $save_name;
				$ip->title = $save_name;
				$ip->save();
			}

			return redirect()->back()->with(['notify' => 'success', 'mss' => "Thêm  thành công"]);

		} else {
			return redirect()->back()->with(['notify' => 'error', 'mss' => "Thêm sản phẩm thất bại"]);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$product = Product::where('id', '=', $id)->get();
		$db = OrderDetail::count_product_order($id);
		if (count($product) > 0) {
			$product_id = $product->first()->id;
			$color = Color::where('product_id', '=', $product_id)->get();
			$size = Size::where('product_id', '=', $product_id)->get();
			$image = ImageProduct::where('product_id', '=', $product_id)->get();

			return view('admin.product.detail', compact('product', 'color', 'size', 'image','db'));
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$category = Category::all();
		$product = Product::where('id', '=', $id)->get();
		if (count($product) > 0) {

			$product_id = $product->first()->id;
			$color = Color::where('product_id', '=', $product_id)->get();
			$size = Size::where('product_id', '=', $product_id)->get();
			$image = ImageProduct::where('product_id', '=', $product_id)->get();

			return view('admin.product.edit', compact('product', 'color', 'size', 'image', 'category'));
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$product_id = $id;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$product_name = $request->product_name;
		$category = $request->category_product;
		$color = $request->color;

		$size = $request->size;
		$amount = $request->amount;
		$unit_price = $request->unit_price;
		$promo_price = $request->promo_price;
		$producer = $request->producer;
		$status = $request['radio-group'];
		$content = $request->content;
		$md = $request->metades;
		$mk = $request->metakey;
		// $photos = $request->file('file');

//product
		$product = Product::find($id);
		$product->product_name = $product_name;
		$product->alias = vn_to_str($product_name);
		$product->category_id = $category;
		$product->unit_price = $unit_price;
		$product->promo_price = empty($promo_price) ? 0 : $promo_price;
		$product->producer = $producer;
		$product->amount = $amount;
		$product->describe = $content;
		$product->meta_keyword = $mk;
		$product->meta_describe = $md;
		$product->status = $status;
		// $product->created = date('Y/m/d');
		// $product->updated = date('Y/m/d');

		if ($product->save()) {
			$cldb = Color::where('product_id', '=', $id)->get();
			$szdb = Size::where('product_id', '=', $id)->get();
			$idclbd = array();
			$idsize = array();
			foreach ($cldb as $cl) {
				array_push($idclbd, $cl->id);
			}

			foreach ($szdb as $sz) {
				array_push($idsize, $sz->id);
			}
//color
			if (count($color) == $cldb->count()) {
				$ik = 0;
				foreach ($idclbd as $id) {

					Color::where('id', '=', $id)->update(['color' => $color[$ik]]);
					$ik += 1;
				}

			} elseif (count($color) > $cldb->count()) {
				$io = 0;
				foreach ($idclbd as $id) {

					Color::where('id', '=', $id)->update(['color' => $color[$io]]);
					unset($color[$io]);
					$io += 1;
				}
				$colornew = array();
				foreach ($color as $vl) {
					array_push($colornew, $vl);
				}
				for ($j = 0; $j < count($colornew); $j++) {
					$c = new Color;
					$c->product_id = $product->id;
					$c->color = $colornew[$j];
					$c->save();
				}

			} else {
				for ($j = 0; $j < ($cldb->count() - count($color)); $j++) {
					foreach ($idclbd as $id) {

						Color::where('id', '=', $id)->delete();
						break;
					}
				}

				foreach ($color as $c) {
					$c = new Size;
					$c->product_id = $product->id;
					$c->color = $c;
					$c->save();
				}

			}

//size
			if (count($size) == $szdb->count()) {
				$ik = 0;
				foreach ($idsize as $id) {

					Size::where('id', '=', $id)->update(['size' => $size[$ik]]);
					$ik += 1;
				}

			} elseif (count($size) > $szdb->count()) {
				$io = 0;
				foreach ($idsize as $id) {

					Size::where('id', '=', $id)->update(['size' => $size[$io]]);

					unset($size[$io]);
					$io += 1;
				}
				$sizenew = array();
				foreach ($size as $vl) {
					array_push($sizenew, $vl);
				}
				for ($j = 0; $j < count($sizenew); $j++) {
					$c = new Size;
					$c->product_id = $product->id;
					$c->size = $sizenew[$j];
					$c->save();
				}

			} else {
				for ($j = 0; $j < ($szdb->count() - count($size)); $j++) {
					foreach ($idsize as $id) {

						Size::where('id', '=', $id)->delete();
						break;
					}
				}

				foreach ($size as $c) {
					$c = new Size;
					$c->product_id = $product->id;
					$c->size = $c;
					$c->save();
				}

			}

			//  if (!is_array($photos)) {
			//     $photos = [$photos];
			// }

			// for ($i = 0; $i < count($photos); $i++) {
			//     $photo = $photos[$i];

			//     $name = sha1(date('YmdHis') . str_random(30));
			//     $save_name = $name . '.' . $photo->getClientOriginalExtension();
			//     $photo->move('public/uploads/product/', $save_name);
			//     $ip = new ImageProduct();
			//     $ip->product_id = $product->id;
			//     $ip->link = null;
			//     $ip->image =  $save_name;
			//     $ip->title =  $save_name;
			//     $ip->save();
			// }

			return redirect()->back()->with(['notify' => 'success', 'mss' => "Cập nhật sản phẩm  thành công"]);

		} else {
			return redirect()->back()->with(['notify' => 'error', 'mss' => "Cập nhật sản phẩm thất bại"]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		
		if(OrderDetail::where('product_id', '=', $id)->get())
		{
            return redirect()->back()->with(['notify' => 'error', 'mss' => "Không thể xóa sản phẩm"]);
		}
		Color::where('product_id', '=', $id)->delete();
		Size::where('product_id', '=', $id)->delete();
		Product::destroy($id);
		$images = ImageProduct::where('product_id', '=', $id)->get();
		foreach ($images as $img) {
			Storage::deleteDirectory("/public/uploads/product/{$img->image}");

		}
		ImageProduct::where('product_id', '=', $id)->delete();
		return redirect()->back()->with(['notify' => 'success', 'mss' => "Xóa sản phẩm  thành công"]);
	}
}
