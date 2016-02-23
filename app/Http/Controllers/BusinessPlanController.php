<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusinessPlanController extends Controller
{
 public function businessPlan()
    {
        return view('TopBar.businessPlan');
    }
}
