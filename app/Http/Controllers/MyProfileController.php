<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyProfileController extends Controller
{
 public function myProfile()
    {
        return view('myProfile');
    }
}
