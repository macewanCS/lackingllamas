<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//controller to direct all dashboard activities
class TopBarController extends Controller
{
	//home page
     public function home()
    {
        return view('TopBar.home');
    }
	//my task page
     public function myTasks()
    {
        return view('TopBar.myTasks');
    }

	// bussiness plan page
     public function businessPlan()
    {
        return view('TopBar.businessPlan');
    }
//teams page
     public function teams()
    {
        return view('TopBar.teams');
    }

     public function departments()
    {
        return view('TopBar.departments');
    }
//notifications page
     public function notifications()
    {
        return view('TopBar.notifications');
    }
 //user profile page
     public function myProfile()
    {
        return view('TopBar.myProfile');
    }
}
