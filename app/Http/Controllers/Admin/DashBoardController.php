<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Post;
class DashBoardController extends Controller
{
    public function index()
    {
    	$product_amount = Product::count();
    	$post_amount=Post::count();
    	return view('admin.dashboard.index',compact('product_amount','post_amount'));
    }

    public function test(Request $request)
    {
    	dd($request);
    }
}
