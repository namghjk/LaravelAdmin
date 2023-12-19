<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view(
            'admin.users.register',
            [
                'title' => 'Đăng ký'
            ]
        );
    }

    public function registerPost(Request $request)
    {

        $this->validate($request, [
            'email' => "required|email:filter",
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $password = $request->password;
        $confirmPassword = $request->confirmPassword;

        if ($password != $confirmPassword) {
            Session::flash('error', 'Mật khẩu không khớp');
            return redirect()->back()->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        Session::flash('success', 'Đăng ký thành công');
        return redirect()->back();
    }
}
