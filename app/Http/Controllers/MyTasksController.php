<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyTasksController extends Controller
{
 public function myTasks()
    {
        return view('TopBar.myTasks');
    }
}