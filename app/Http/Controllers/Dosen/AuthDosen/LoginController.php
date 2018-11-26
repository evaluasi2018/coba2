<?php

namespace App\Http\Controllers\Dosen\AuthDosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:dosen')->except(['logout','logoutDosen']);
    }

    public function showLoginForm()
    {
        return view('dosen/authDosen.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'nip' =>  'required',
            'password'  =>  'required|min:6'
        ]);

        $credential = [
            'nip' =>  $request->nip,
            'password' =>  $request->password,
        ];

        if (Auth::guard('dosen')->attempt($credential,$request->member)) {
            return redirect()->intended(route('dosen.dashboard'));
        }
        return redirect()->back()->withInput($request->only('nip','remember'));
    }

    public function logoutDosen()
    {
        Auth::guard('dosen')->logout();
        return redirect()->route('dosen.login');
    }

    public function username()
    {
        return 'nip';
    }
}
