<?php

namespace App\Http\Controllers;
use App\Http\Requests\CheckOutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Mail\SendOrder;
use Illuminate\Support\Facades\Mail;
use App\About;

class OrderController extends Controller
{
    public function delorder($has)
    {   $id =0;
        $orders = Order::all();

        foreach ($orders as  $od) {
           if($od->id==base64_decode($has))
            {
                 $id=$od->id;
            }
          
        }

          if($id==base64_decode($has))
            {
                $order=Order::find($id);
                $now = date("Y/m/d H:i:s");
                $check = date('Y/m/d H:i:s',strtotime('+24 hour',strtotime($order->created)));
                if($now>$check)
                {
                    $order->status=2;
                    $order->create_by=-1; 
                    if($order->save()){
                   
                    return redirect('/')->with('msgo', 'hủy đơn thành công');
                }
            }
                else{
                   
                    return redirect('/')->with('msgo', 'hủy đơn hết hạn');
                }
                
            }else{

                 
                  return redirect('/')->with('msgo', 'Không tìm thấy đơn hàng');

            }
    }
    public function getcheckout()
    {
    	$carts = Cart::content();
    	$total = Cart::total();
    	return view('page.order.checkout',compact('carts','total'));
    }
    public function checkout(CheckOutRequest $request)
    {
    	
    		
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
    	$name =  $request->name;
    	$address= $request->address;
    	$email = $request->email;
    	$phone = $request->phone;
    	$note = $request->note;
    	$payment=$request->payment;

    	$order = new Order;
    	$order->user_id=Auth::guard('web')->check()?Auth::guard('web')->user()->id : 0;
    	$order->email=$email;
    	$order->phone=$phone;
    	$order->address=$address;
    	$order->total=(int)stringtonumber(Cart::total());
    	$order->status=0;
    	$order->created=date("Y/m/d H:i:s");
    	$order->name=$name;
    	$order->note=$note;
    	$order->payment=$payment;
    	if($order->save())
    	{   
    		$carts = Cart::content();
    		$id_order = $order->id;
    		foreach ($carts as $cart) {
    			$detail = new OrderDetail;
    			$detail->order_id=$id_order;
    			$detail->product_id=$cart->id;
    			$detail->amount=$cart->qty;
    			$detail->color=$cart->options->color;
                $detail->product_name=Product::find($cart->id)->product_name;
    			$detail->size=$cart->options->size;
    			$detail->save();
    		}
            Cart::destroy();
    	}
    	if(Auth::guard('web')->check()===true)
    		return redirect( route('infoorder') );
         
          $about = About::find(1);
          $orderdetails = OrderDetail::where('order_id','=',$order->id)->get();
         
          // try{
          //   Mail::to($order->email)->send(new SendOrder($order,$orderdetails,$about));
          // }
          // catch(Exception $e){
            
          // }
    	  $request->session()->flash('status', 'đặt hàng thành công');
            return redirect('/');


    }
}
