<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use App\Objective;
use App\Action;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusinessPlanController extends Controller
{
 public function businessPlan()
    {
    	$goals = Goal::all();
    	$objectives = Objective::all();
    	$actions = Action::all();
    	$tasks = Task::all();
        return view('TopBar.businessPlan',compact('goals','objectives','actions','tasks'));
    }
}
