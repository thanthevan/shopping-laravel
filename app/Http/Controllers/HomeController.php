<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use App\About;
use App\FeedBack;
use App\OrderDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FeedBackRequest;

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
      
        $products = Product::with('color','size','image_product')->whereIn('id', $id )->get();

        $post = Post::where('status','=',1)->limit(5)->inRandomOrder()->get(); 
        return view('page.home.home',compact('products','post'));
    }

    public function contact()
    {
        $about= About::all();
       return view('page.contact.contact',compact('about'));
    }

    public function feedback(FeedBackRequest $request)
    {
       $name = $request->name;
       $email=  $request->email;
       $title =  $request->title;
       $content =  $request->content;
       $feedback = new FeedBack;
       $feedback->name = $name;
       $feedback->title = $title;
       $feedback->email = $email;
       $feedback->content = $content;
       $feedback->created = date('Y/m/d');
        if($feedback->save()){
            return back()->with('ms', 'Gửi thành công!');
        }
        else{
           return back()->with('msg', 'Gửi thất bại');
        }
        

    }

    public function support()
    {
      return view('page.contact.support');
    }

    
}
