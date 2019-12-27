<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cookie;

use Session;
class HomeController extends Controller
{
    public function showLogin()
    {
        // show the form
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    }

    public function doLogout(Request $request){
        Auth::logout();
        //Session::flush();
        //$request->session()->flush();
        
        
        return redirect()->intended(route('login'));
        setcookie("laravel_session", "", time() - 3600);
    }
}
