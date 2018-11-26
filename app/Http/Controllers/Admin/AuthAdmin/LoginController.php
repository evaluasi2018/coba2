<?php

namespace App\Http\Controllers\Admin\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout','logoutAdmin']);
    }

    public function showLoginForm()
    {
        return view('admin/authAdmin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'username' =>  'required',
            'password'  =>  'required|min:6'
        ]);

        $credential = [
            'username' =>  $request->username,
            'password' =>  $request->password,
        ];

        if (Auth::guard('admin')->attempt($credential,$request->member)) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('username','remember'));
    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function username()
    {
        return 'username';
    }
}
