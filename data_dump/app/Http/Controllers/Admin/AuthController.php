<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    function login(){
        return view('admin.login');
    }

    function attempt(){
        if (Auth::attempt(['email' => request()->email, 'password' => request()->password, 'type' => 999])) {
            return redirect()->intended('dashboard');
        } 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function logout(){
        Auth::logout();
        return redirect()->route('admin.dashboard');
    }
}
