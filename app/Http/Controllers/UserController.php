<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Order;
use App\OrderDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
class UserController extends Controller
{

    // protected $redirectTo = '/';

    public function getauthen()
    {
        return view('page.user.authen');
    }
    public function login(LoginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            return redirect(route('home'));

        } else {
            return back()->with('msg', 'Sai tài khoản hoặc mật khẩu');
        }

    }

    public function logout()
    {
        Auth::logout();
        Cart::destroy();
        return redirect(route('home'));
    }

    public function infouser()
    {
        return view('page.user.info');
    }
    public function infoorder()
    {
        $orders = Order::where('user_id', '=', Auth::user()->id)->paginate(5);

        return view('page.user.listorder', compact('orders'));
    }
    public function register(RegisterRequest $request)
    {

        $user = new User ;
        $user->name = $request->nameres;
        $user->email =$request->emailres;
        $user->phone =$request->phoneres;
        $user->address =$request->addressres;
        $user->password = bcrypt($request->passwordres);
        $user->created_at = date('Y/m/d');
        if($user->save())
        {
            return back()->with('ms', 'Đăng ký thành công!');
        }else{
           return back()->with('ms', 'Đăng ký thất bại');
        }
        
    }
    public function updateinfo(UpdateUserRequest $request)
    {
           
        $user =  User::find($request->id) ;
        $user->name = $request->name;
        $user->birthday = date('Y/m/d',strtotime($request->birthday));
        $user->phone =$request->phone;
        $user->address =$request->address;
        if($request->password!='abcdef'){
        $user->password = bcrypt($request->password);  
        }
       
        if($user->save())
        {
            return back()->with('ms', 'Cập nhật thành công!');
        }else{
           return back()->with('ms', 'Cập nhật thất bại');
        }
        
    }
    public function resetpasswork(Request $request)
    {

    }

    public function vieworder(Request $request)
    {  $id =  $request->id;
       $orderdetails = OrderDetail::where('order_id','=',$id)->get();
       return view('page.user.detailorder',compact('orderdetails'));
    }
    public function deleteorder(Request $request)
    {
        $id =$request->id;
        $order =Order::find($id);
        if($order )
        {
           $order->status=2;
           $order->create_by=-1; 
           if($order->save()){
            return back()->with('ms', 'Hủy đơn hàng thành công!');
        }
        else{
           return back()->with('msg', 'Hủy đơn hàng thất bại');
        }
        }else{

        }
    }
}
