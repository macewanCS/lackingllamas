<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Debugbar;
use Auth;

class LoginController extends Controller
{

    public function login()
    {
        if (Auth::guest()){
            return view('auth/login');
        } else {
            return redirect('businessplan');
        }
    }
}
