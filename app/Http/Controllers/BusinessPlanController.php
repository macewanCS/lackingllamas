<?php

namespace App\Http\Controllers;


use App\Goal;
use App\Objective;
use App\Action;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Request;

class BusinessPlanController extends Controller
{

  //page does not require login
  public function __construct() {}

 public function businessPlan()
    {
    	$goals = Goal::all();
    	$objectives = Objective::all();
    	$actions = Action::all();
    	$tasks = Task::all();
        return view('businessPlan',compact('goals','objectives','actions','tasks'));
    }
  public function createGoal()
  {
  	return view('businessPlan.createGoal');
  }
   public function storeGoal()
  {
  	$input=Request::all();
  	$input['bpid'] = 1;
  	Goal::create($input);
  	return redirect('businessplan');
  }
  public function createObjective()
  {
    $goals = Goal::lists('name');
    return view('businessPlan.createObjective',compact('goals'));
  }
   public function storeObjective()
  {
    $goals = Goal::all();
    $input=Request::all();
    $input['goal_id'];
    foreach ($goals as $goal)
    {
      if($input['goal_id']==$goal->name)
      {

        $input['goal_id'] = $goal->id;
      }
    }
    Objective::create($input);
    return redirect('businessplan');
  }
}

       