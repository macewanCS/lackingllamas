<?php

namespace App\Http\Controllers;


use App\Goal;
use App\Objective;
use App\Action;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;


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
   public function editGoal($id)
   {
      $goal = Goal::findOrFail($id);
      return view('businessPlan.editGoal',compact('goal'));
   }
   public function editObjective($id)
   {
      $objective = Objective::findOrFail($id);
      $goals = Goal::lists('name');
      return view('businessPlan.editObjective',compact('objective','goals'));
   }
  public function editAction($id)
   {
      $action = Action::findOrFail($id);
      $objectives = Objective::lists('name');
      return view('businessPlan.editAction',compact('action','objectives'));
   }
   public function editTask($id)
   {
      $task = Task::findOrFail($id);
      $actions = Action::lists('description');
      return view('businessPlan.editTask',compact('task','actions'));
   }
   public function update($id,Request $request )
   {
    $goal = Goal::findOrFail($id);
    $goal->update(Request::all());
    return redirect('businessplan');
   }
}

       