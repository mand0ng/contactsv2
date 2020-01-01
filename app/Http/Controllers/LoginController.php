<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/home');
        }
        return back()->with('error','Incorrect Credentials! Please try again.*');
    }

    public function doLogout(Request $request){
        Auth::logout();
        //Session::flush();
        //$request->session()->flush();
        
        
        return redirect()->intended('/');
       
    }
    public function showLogin()
    {
        // show the form
        return view('login');
    }
}
