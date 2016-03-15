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

  public function createObjective()
  {
    $goals = Goal::lists('name');
    return view('businessPlan.createObjective',compact('goals'));
  }


    public function createAction()
  {
    $objectives = Objective::lists('name');
    return view('businessPlan.createAction',compact('objectives'));
  }


    public function createTask()
  {
    $actions = Action::lists('description');

    return view('businessPlan.createTask',compact('actions'));
  }
   public function store()
   {
       $input = Request::all();

          

               if (Request::has('bpid')) {

                   $input['bpid'] = 1;
                   Goal::create($input);
               }
               if (Request::has('goal_id')) {
                   $input['goal_id'] += 1;
                   Objective::create($input);
               }
               if (Request::has('objective_id')) {

                   $input['objective_id'] += 1;
                   Action::create($input);
               }
               if (Request::has('action_id')) {
                   $input['action_id'] += 1;
                   Task::create($input);
               }

               return redirect('businessplan');
           
       
   }
}

       