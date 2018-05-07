<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;
use App\CategoryPost;
use App\Order;
use App\OrderDetail;
use App\User;
use App\Post;
use App\Admin;
use App\FeedBack;
use App\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\fb;
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
        $orders = Order::where('status','=',$status)->orderBy('created' ,'DESC')->paginate(10); 
        return view('admin.order.index',compact('orders'));
    }

     public function get_post_by_pci($id)
    {    $categorypost = CategoryPost::all();
        $post = Post::where('category_post','=',$id)->orderBy('created' ,'DESC')->paginate(10); 
        return view('admin.post.index',compact('post','categorypost')); 
    }

    public function get_order_by_created($from,$to)
    {
       $orders = Order::whereBetween('created',[$from,$to])->orderBy('created' ,'DESC')->paginate(10); 
       return view('admin.order.index',compact('orders'));
    }

    public function employee()
    {
      $roles = Role::all();
      $users=Admin::paginate(10);
      return view('admin.user.employee.index',compact('users','roles'));
    }
  public function addemployee(Request $request)
  {
    if($request->repassword != $request->password)
        {  
            return back()->with('err','Mật khẩu nhập không khớp');
            
        }else{ 
    $admin = new Admin;
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->phone= $request->phone;
     $admin->role_id= $request->role;
    $admin->password = bcrypt($request->password);
        if($admin->save())
        {
            return redirect()->back()->with(['notify' => 'success', 'mss' => "Thêm thành công"]);
        }else{
            return redirect()->back()->with(['notify' => 'error', 'mss' => "Thêm thất bại !"]);
        }
        }
  }
 public function showemployee($id)
 {
   $roles = Role::all();
   $admin =Admin::find($id);
   return view('admin.user.employee.handle',compact('admin','roles'));
 }
 public function updateemployee(Request $request)
 {
   if($request->repassword != $request->password)
        {  
            return back()->with('err','Mật khẩu nhập không khớp');
            
        }else{ 
    $admin =Admin::find($request->id);
    if($request->role=='')
       $admin->role_id=1;
     else
      $admin->role_id= $request->role;
    
        if($admin->save())
        {
            return redirect()->back()->with(['notify' => 'success', 'mss' => "Sửa thành công"]);
        }else{
            return redirect()->back()->with(['notify' => 'error', 'mss' => "Sửa thất bại !"]);
        }
        }
 }
  public function deleteemployee($id)
  {
     $admin =  Admin::find($id);
     if($admin)
     {
      if($admin->delete()){

        return redirect()->back()->with(['notify' => 'success', 'mss' => "Xóa thành công"]);
        }else{
            return redirect()->back()->with(['notify' => 'error', 'mss' => "Xóa thất bại !"]);
        }

     }
  }
    public function filteruser(Request $request)
    {
      $keyword = $request->keyword;
      $user = User::where('name', 'like', '%'.$keyword.'%')->orWhere('email', 'like',$keyword)->orWhere('phone', 'like',$keyword)->get();
      return view('admin.user.customer.result',compact('user'));
    }
    public function filteremployee(Request $request)
    {
      $keyword = $request->keyword;
      $user = Admin::where('name', 'like', '%'.$keyword.'%')->orWhere('email', 'like',$keyword)->orWhere('phone', 'like',$keyword)->get();
      return view('admin.user.employee.result',compact('user'));
    }
    public function sendmail(Request $request)
    {
      $feedback = FeedBack::find( $request->id);
        
       return response()->json(['mail'=>$feedback->email]);
    }

    public function send(Request $request)
    {  
         $obj = new \stdClass();
         $obj->title = $request->title;
         $obj->content =$request->content;
        
         Mail::to($request->to)->send(new fb($obj));
       return redirect()->back()->with(['notify' => 'success', 'mss' => "Đã gửi"]);
    
    }

}
