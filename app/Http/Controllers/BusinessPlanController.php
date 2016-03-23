<?php

namespace App\Http\Controllers;


use App\Goal;
use App\Objective;
use App\Action;
use App\Task;
use App\Group;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use DB;
//use Illuminate\Http\Request;
//use Request;


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
    $goals = Goal::all();
    $groups = Group::lists('name');
    $counted = count($goals)+1;
  	return view('businessPlan.createGoal',compact('counted','groups'));
  }

  public function createObjective()
  {
    $goals = Goal::lists('name');
    $objective = Objective::all();
    $groups = Group::lists('name');
    $counted = count($objective)+1;

    return view('businessPlan.createObjective',compact('goals','counted','groups'));
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
                    $input['group'] += 1;
                    Goal::create($input);
               }
               if (Request::has('goal_id')) {

                   $input['group'] += 1;
                   $input['goal_id'] += 1;
                   $objectiveIdent = count(DB::table('objectives')->where('goal_id', $input['goal_id'])->get())+1;
                   $goalIdent = $input['goal_id'];
                   $input['ident'] ="$goalIdent.$objectiveIdent";
                   //return $input['group'];
                   Objective::create($input);
               }
               if (Request::has('objective_id')) {
                   $input['group'] += 1;
                   $input['objective_id'] += 1;
                   Action::create($input);
               }
               if (Request::has('action_id')) {
                   $input['group'] += 1;
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
   public function update($id,Request2 $request )
   {
    $goal = Goal::findOrFail($id);
    $goal->update(Request2::all());
    return redirect('businessplan');
   }
}

       