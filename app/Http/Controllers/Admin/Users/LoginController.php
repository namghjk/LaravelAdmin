<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
  public function index()
  {
    return view('admin.users.login', [
      'title' => 'Đăng nhập vào hệ thống'
    ]);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      "email" => "required|email:filter",
      "password" => "required",
    ]);

    if (Auth::attempt([
      'email' => $request->input('email'),
      'password' => $request->input('password'),
    ], $request->input('remember'))) {
      Session::flash('success', 'Đăng nhập thành công');
      return redirect()->route('admin');
    }
    Session::flash('error', 'Email hoặc password không đúng');
    return redirect()->back();
  }

  public function logout(Request $request){
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin');
  }
}
