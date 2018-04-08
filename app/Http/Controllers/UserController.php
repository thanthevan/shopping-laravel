<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect(route('home'));
    }

    public function infouser()
    {
        return view('page.user.info');
    }
    public function infoorder()
    {
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();

        return view('page.user.listorder', compact('orders'));
    }
    public function register(Request $request)
    {

        return view('page.user.listorder');
    }
    public function resetpasswork(Request $request)
    {

    }
}
