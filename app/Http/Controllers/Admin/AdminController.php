<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use App\Order;
use App\OrderDetail;
use App\User;
use App\Admin;
class AdminController extends Controller
{
    public function get_login_admin()
    {
        return view('admin.auth.login');
    }
    public function login_admin(LoginRequest $request)
    {
        if($request->isMethod('post'))
        {
           if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
            return redirect(route('dashboard'));
           else 
            return back()->with('msg', 'Sai tài khoản hoặc mật khẩu');
        }
     else
    {
         return redirect(route('login'));
    }
  }


 
    public function logout_admin()
    {
          Auth::guard('admin')->logout();
          return redirect( route('login'));
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        $orderdetails = OrderDetail::where('order_id','=',$id)->get();
        return view('admin.order.invoice',compact('order','orderdetails')); 
    }

    public function get_order_by_status($status)
    {
        $orders = Order::where('status','=',$status)->paginate(3); 
        return view('admin.order.index',compact('orders'));
    }
    public function get_order_by_created($from,$to)
    {
       $orders = Order::whereBetween('created',[$from,$to])->paginate(3); 
       return view('admin.order.index',compact('orders'));
    }

    public function employee()
    {
      $users=Admin::paginate(9);
      return view('admin.user.employee.index',compact('users'));
    }
}
