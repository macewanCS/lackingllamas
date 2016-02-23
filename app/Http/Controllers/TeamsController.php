<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamsController extends Controller
{
 public function teams()
    {
        return view('TopBar.teams');
    }
}
