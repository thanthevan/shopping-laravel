<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\User;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(3); 
        return view('admin.order.index',compact('orders'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $orderdetails = OrderDetail::where('order_id','=',$id)->get();
        $cb = Order::where('user_id','=',$order->user_id)->count();
        if($order->user_id!=0)
        {
            $user=User::find($order->user_id);
           return view('admin.order.detail',compact('order','orderdetails','user','cb')); 
        }else{

            return view('admin.order.detail',compact('order','orderdetails')); 
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       date_default_timezone_set('Asia/Ho_Chi_Minh');
    
        $order = Order::find($id);
        $order->status =$request->status;
        $order->updated= date('Y/m/d');
        if($order->save())
        {
         return redirect()->back()->with(['notify'=>'success','mss'=>"Xác thực thành công"]);
        } else
        {
        return redirect()->back()->with(['notify'=>'error','mss'=>"Xác thực thất bại"]);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
