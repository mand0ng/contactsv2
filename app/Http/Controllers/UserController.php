<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        
        // dd(Auth::user()->contacts);
        return view('user.home')->with(['contacts' => Auth::user()->contacts]);
    }

    public function showForm(){
        return view("user.create-form");
    }

    public function create(Request $request){
        $new_user = $request->except('password2');
        $new_user = User::prepare($new_user);
        
        if($user = User::create($new_user)){
            $res =  'You have successfully registered.<br> You will be redirected to login page in 5 seconds';
        }else{
            $res =  'try again';
        }
        return response($res)->header('Refresh','5;url=/login');
    }

    public function checkEmail(){
        
        $email = Input::get('email');
        if($email){
            $count = User::where('email', $email)->first();
            if($count)
                return 'false';
            return 'true';
        }
        return response('',500);
        
    }
}
 