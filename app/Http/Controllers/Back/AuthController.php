<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }

    public function loginPost(Request $request)
    {
        $isLogin = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (!$isLogin) {
            return redirect()->route('admin.login')->withErrors('Email veya şifre hatalı!');
        }
        
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
