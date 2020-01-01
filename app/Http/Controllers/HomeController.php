<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
class HomeController extends Controller
{
    public function showLogin()
    {
        // show the form
        return view('login');
    }

   
}
