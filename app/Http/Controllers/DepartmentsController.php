<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{

 public function departments()
    {
        return view('departments');
    }
}
