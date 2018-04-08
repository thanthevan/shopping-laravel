<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $max =  DB::table('orderdetail')->selectRaw('product_id')->groupBy('product_id')->orderByRaw('COUNT(*) DESC')->limit(10)->get();
         $id =array();
         foreach ($max as $value) {
             array_push($id, $value->product_id);
            }

        $post = Post::where('status','=',1)->limit(5)->inRandomOrder()->get(); 
      
        $products = Product::with('color','size','image_product')->whereIn('id', $id )->get();
        return view('page.home.home',compact('products','post'));
    }
}
