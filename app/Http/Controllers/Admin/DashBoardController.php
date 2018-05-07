<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Post;
use App\Category;
use App\CategoryPost;
use App\User;
use App\Admin;
use App\Order;
use App\Http\Requests\AboutRequest;
use App\About;
class DashBoardController extends Controller
{
    public function index()
    {   
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $about = About::find(1);
        $start = date("Y/m/d");
        $start  =  $start .' 00:00:00';
        $now= date('Y/m/d H:m:i');

        $category = Category::count();
        $categorypost = CategoryPost::count();
        $order= Order::count();
        $odtd = Order::where('created','>=',$start)->where('created','<=',$now)->where('status','=',0)->count();
      
        $user = User::count();
        $admin = Admin::count();
    	$product_amount = Product::count();
    	$post_amount=Post::count();
    	return view('admin.dashboard.index',compact('product_amount','post_amount','category','categorypost','user','admin','order','odtd','about'));
    }

    public function about(AboutRequest $request)
    {
        $about = About::find(1);
        $about->email = $request->email;
        $about->phone = $request->phone;
        $about->address = $request->address;
         if($about->save())
         {
              return redirect()->back()->with(['notify'=>'success','mss'=>"Cập nhật thành công"]);
         }else{
            return redirect()->back()->with(['error'=>'success','mss'=>"Cập nhật thất bại"]);
         }
    }
}
