<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\Http\Requests\UserRequest; 
use App\Http\Requests\RegisterRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(6);
       return view('admin.user.customer.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        
        if($request->repassword != $request->password)
        {  
            return back()->with('err','Mật khẩu nhập không khớp');
            
        }else{ 
        $user = new User ;
        $user->name = $request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->address =$request->address;
        $user->password = bcrypt($request->password);
        $user->created_at = date('Y/m/d');
        if($user->save())
        {
            return redirect()->back()->with(['notify' => 'success', 'mss' => "Thêm thành công"]);
        }else{
            return redirect()->back()->with(['notify' => 'error', 'mss' => "Thêm thất bại !"]);
        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.customer.edit',compact('user'));
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
    public function update(UserRequest $request, $id)
    {
      

        if($request->repassword != $request->password)
        {  
            return back()->with('err','Mật khẩu nhập không khớp');

        }else{ 
        $user = User::find($id);
        $user->name = $request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->address =$request->address;
        $user->password = bcrypt($request->password);
        if($user->save())
        {
            return redirect()->back()->with(['notify' => 'success', 'mss' => "Sửa thành công"]);
        }else{
            return redirect()->back()->with(['notify' => 'error', 'mss' => "Sửa thất bại !"]);
        }
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
        $order = Order::where('user_id','=',$id);
        if($order->count()!=0)
        {
           return redirect()->back()->with(['notify' => 'error', 'mss' => "Không thể xóa thành viên"]);

        }else
        {
           $user = User::destroy($id);
           return redirect()->back()->with(['notify' => 'success', 'mss' => "Xóa  thành công"]);

        }
    }
}
