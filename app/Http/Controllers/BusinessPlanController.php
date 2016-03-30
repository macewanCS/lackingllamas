<?php

namespace App\Http\Controllers;

use App\BusinessPlan;
use App\Goal;
use App\Objective;
use App\Action;
use App\Task;
use App\User;
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

  public function test()
  {
    // $users = DB::select('select * from users where active = ?', [1]);
    //ORDER BY ident;
    // EXISTS (SELECT * FROM t2)
   // $bp = BusinessPlan::all();
    //$goal = Goal::all();
    //$objective = Objective::all();
    //$action = Action::all();

    //$task = Task::all();
   // $comments = Post::find(1)->comments;
    // $roles = DB::select('select goals.name, goals.ident from goals union all select objectives.name, objectives.ident from objectives');
    //union all select actions.description, action.ident from actions'
    $roles = DB::select('select * from (select null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = 1 union all select null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = 1 union all select actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = 1 union all select tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = 1)a order by ident');
     // ->where('id', 1)
    //>get();
   // $roles = json_decode($roles);
//print $obj->{'foo-bar'}; 
    foreach($roles as $role)
{
   return $role['name'];
}
    return $roles;

  }
      
 public function businessPlan()
    {
        $bpPlans = DB::select('select * from (select  null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, goals.group, goals. id, null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = 1 union all select null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, objectives.group, objectives.id, null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = 1 union all select actions.userId, actions.progress, actions.date, actions.successMeasured, actions.budget, actions.collaborators, actions.group, actions.id, actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = 1 union all select tasks.userId, tasks.progress, tasks.date, tasks.successMeasured, tasks.budget, tasks.collaborators, tasks.group, tasks.id, tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = 1)a order by ident');
        $users = User::all();
        $groups = Group::all();
        $filters = null;
        return view('businessPlan',compact('users', 'groups','bpPlans', 'filters'));
    }
  public function createBP()
  {
    $bp = BusinessPlan::all();
    $counted = count($bp)+1;
    //$groups = Group::lists('name');
    //$counted = count($goals)+1;
    return view('businessPlan.createBP',compact('counted'));
  }
  public function createGoal()
  {
    $bp = BusinessPlan::lists('name');
    $goals = Goal::all();
    $groups = Group::lists('name');
    $counted = count($goals)+1;
  	return view('businessPlan.createGoal',compact('counted','groups','bp'));
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
    $action = Action::all();
    $groups = Group::lists('name');
    $user = User::lists('name');
    $counted = count($action)+1;
    return view('businessPlan.createAction',compact('objectives','counted','groups','user'));
  }


    public function createTask()
  {
    $actions = Action::lists('description');
    $task = Task::all();
    $groups = Group::lists('name');
    $user = User::lists('name');
    $counted = count($task)+1;
    return view('businessPlan.createTask',compact('actions','counted','groups','user'));
  }
   public function store()
   {
       $input = Request::all();
       
               if (Request::has('created')) {
                    BusinessPlan::create($input);
               }
               if (Request::has('bpid')) {
                    $input['group'] += 1;
                    $input['bpid'] += 1;
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
                   $input['userId'] += 1; 
                   $objectiveIdent = DB::table('objectives')->where('id', $input['objective_id'])->pluck('ident');
                   $actionIdent = count(DB::table('actions')->where('objective_id', $input['objective_id'])->get())+1;
                   $input['ident'] = "$objectiveIdent[0].$actionIdent";            
                   Action::create($input);
               }
               if (Request::has('action_id')) {
                   $input['group'] += 1;
                   $input['action_id'] += 1;
                   $input['userId'] += 1; 
                   $actionIdent = DB::table('actions')->where('id', $input['action_id'])->pluck('ident');
                   $taskIdent = count(DB::table('tasks')->where('action_id', $input['action_id'])->get())+1;
                   $input['ident'] = "$actionIdent[0].$taskIdent";
                   Task::create($input);
               }

               return redirect('businessplan');
           
       
   }
   public function editBP($id)
   {
      $bp = BusinessPlan::findOrFail($id);
      return view('businessPlan.editBP',compact('bp'));
   }
   public function editGoal($id)
   {

      $goal = Goal::findOrFail($id);
      $groups = Group::lists('name');
      $bp = BusinessPlan::lists('name');
      return view('businessPlan.editGoal',compact('goal','groups','bp'));
   }
   public function editObjective($id)
   {
      $objective = Objective::findOrFail($id);
      $goals = Goal::lists('name');
      $groups = Group::lists('name');
      return view('businessPlan.editObjective',compact('objective','goals','groups'));
   }
  public function editAction($id)
   {
      $action = Action::findOrFail($id);
      $objectives = Objective::lists('name');
      $groups = Group::lists('name');
      $user = User::lists('name');
      return view('businessPlan.editAction',compact('action','objectives','groups','user'));
   }
   public function editTask($id)
   {
      $task = Task::findOrFail($id);
      $actions = Action::lists('description');
      $groups = Group::lists('name');
      $user = User::lists('name');
      return view('businessPlan.editTask',compact('task','actions','groups','user'));
   }
   public function update($id,Request $request )
   {
      $input = Request::all();
      if(Request::has('created')){
      $bp = BusinessPlan::all();
      $bp->update($input);

      }
      if (Request::has('bpid')) {

        $goal = Goal::findOrFail($id);
        $input['group'] += 1;
        $input['bpid'] += 1;      
        $goal->update($request);
      }
      if (Request::has('goal_id')) {
        $objective = Objective::findOrFail($id);
        $input['group'] += 1;
        $input['goal_id'] += 1;  
        $objective->update($input);
      }
      if (Request::has('objective_id')) {
        $action = Action::findOrFail($id);
        $input['group'] += 1;
        $input['objective_id'] += 1;
        $input['userId'] += 1; 
        $action->update(Request::all());
      }
      if (Request::has('action_id')) {
        $task = Task::findOrFail($id);
        $input['group'] += 1;
        $input['action_id'] += 1;
        $input['userId'] += 1; 
        $task->update($input);
      }
    return redirect('businessplan');
   }


    function deleteGoal ($id, Request $request) {
        Goal::findOrFail($id)->first()->delete();
        return;
    }
}

       