<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Debugbar;
use Auth;
use App\BusinessPlan;

class LoginController extends Controller
{

    public function login()
    {
        $bp = BusinessPlan::orderBy('created', 'desc')->first()->id;
        $link = "businessplan/";
        $link .= strval($bp);
        if (Auth::guest()){
            return view('auth/login');
        } else {
            return redirect($link);
        }
    }
}
