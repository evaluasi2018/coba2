<?php

namespace App\Http\Controllers\Mahasiswa\AuthMahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:mahasiswa')->except(['logout','logoutMahasiswa']);
    }

    public function showLoginForm()
    {
        return view('mahasiswa/authMahasiswa.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'npm' =>  'required',
            'password'  =>  'required|min:6'
        ]);

        $credential = [
            'npm' =>  $request->npm,
            'password' =>  $request->password,
        ];

        if (Auth::guard('mahasiswa')->attempt($credential,$request->member)) {
            return redirect()->intended(route('mahasiswa.dashboard'));
        }
        return redirect()->back()->withInput($request->only('npm','remember'));
    }

    public function logoutMahasiswa()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect()->route('sievaluasi.loginform');
    }

    public function username()
    {
        return 'npm';
    }
}
