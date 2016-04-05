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
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use DB;
use Zizaco\Entrust\Entrust;
use Log;

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

 public function lastBP()
 {
    $bp = BusinessPlan::all();
    $idbp = count($bp);
     $bpPlans = DB::select("select * from (select  null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, goals.bp, goals.group, goals.id, null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, null as bp, objectives.group, objectives.id, null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select actions.userId, actions.progress, actions.date, actions.successMeasured, actions.budget, actions.collaborators, null as bp, actions.group, actions.id, actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select tasks.userId, tasks.progress, tasks.date, tasks.successMeasured, tasks.budget, tasks.collaborators, null as bp, tasks.group, tasks.id, tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."')a order by ident");
     $users = User::all();
     $groups = Group::all();
     $filters = null;
     if (Auth::check()) {
         $user = User::find(Auth::id());
         if ($user->hasRole('admin')) $permission = 4;
         else if ($user->hasRole('bpLead')) $permission = 3;
         else if ($user->hasRole('leader')) $permission = 2;
         else if ($user->hasRole('user')) $permission = 1;
         else $permission = 0;
     }
     else {
         $permission = 0;
     }
     $userId  = Auth::id();
     $thisUser = User::find($userId);
     if ($thisUser == null) $thisUser = (object) array("name" => "null");
     $thisGroups = DB::select("select distinct groups.name as name from groups, users where groups.user_ID = '".$userId."'");
     $nameBP=$bp[$idbp-1]->name;
     return view('businessPlan',compact('users', 'groups','bpPlans','idbp', 'filters', 'nameBP', 'permission', 'thisUser', 'thisGroups','bp'));
 }

 public function businessPlan($idbp)
    {
          $bp = BusinessPlan::all();
   
        $bpPlans = DB::select("select * from (select  null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, goals.bp, goals.group, goals.id, null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, null as bp, objectives.group, objectives.id, null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select actions.userId, actions.progress, actions.date, actions.successMeasured, actions.budget, actions.collaborators, null as bp, actions.group, actions.id, actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select tasks.userId, tasks.progress, tasks.date, tasks.successMeasured, tasks.budget, tasks.collaborators, null as bp, tasks.group, tasks.id, tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."')a order by ident");
        $users = User::all();
        $groups = Group::all();
        $nameBP=$bp[$idbp-1]->name;
        $filters = null;
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->hasRole('admin')) $permission = 4;
            else if ($user->hasRole('bpLead')) $permission = 3;
            else if ($user->hasRole('leader')) $permission = 2;
            else if ($user->hasRole('user')) $permission = 1;
            else $permission = 0;
        }
        else {
            $permission = 0;
        }
        $userId  = Auth::id();
        $thisUser = User::find($userId);
        if ($thisUser == null) $thisUser = (object) array("name" => "null");
        $thisGroups = DB::select("select distinct groups.name as name from groups, users where groups.user_ID = '".$userId."'");
        return view('businessPlan',compact('users', 'groups','bpPlans','idbp', 'filters', 'nameBP', 'permission', 'thisUser', 'thisGroups','bp'));


    }

    public function userFilter ($idbp, $userId)
    {
        $bp = BusinessPlan::all();

        $bpPlans = DB::select("select * from (select  null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, goals.bp, goals.group, goals.id, null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, null as bp, objectives.group, objectives.id, null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select actions.userId, actions.progress, actions.date, actions.successMeasured, actions.budget, actions.collaborators, null as bp, actions.group, actions.id, actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select tasks.userId, tasks.progress, tasks.date, tasks.successMeasured, tasks.budget, tasks.collaborators, null as bp, tasks.group, tasks.id, tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."')a order by ident");
        $users = User::all();
        $groups = Group::all();
        $nameBP=$bp[$idbp-1]->name;
        $userFilter = User::find($userId);
        if ($userFilter == null) {
            $filters = null;
        }
        else {
            $filters = array(
                "type" => "none",
                "collabs" => "none",
                "leads" => array($userFilter->name),
                "groups" => "none",
                "objective" => null
            );
        }
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->hasRole('admin')) $permission = 4;
            else if ($user->hasRole('bpLead')) $permission = 3;
            else if ($user->hasRole('leader')) $permission = 2;
            else if ($user->hasRole('user')) $permission = 1;
            else $permission = 0;
        }
        else {
            $permission = 0;
        }
        $userId  = Auth::id();
        $thisUser = User::find($userId);
        if ($thisUser == null) $thisUser = (object) array("name" => "null");
        $thisGroups = DB::select("select distinct groups.name as name from groups, users where groups.user_ID = '".$userId."'");
        return view('businessPlan',compact('users', 'groups','bpPlans','idbp', 'filters', 'nameBP', 'permission', 'thisUser', 'thisGroups', 'bp'));
    }

    public function collabFilter ($idbp, $collabName) {

        $bp = BusinessPlan::all();

        $bpPlans = DB::select("select * from (select  null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, goals.bp, goals.group, goals.id, null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, null as bp, objectives.group, objectives.id, null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select actions.userId, actions.progress, actions.date, actions.successMeasured, actions.budget, actions.collaborators, null as bp, actions.group, actions.id, actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select tasks.userId, tasks.progress, tasks.date, tasks.successMeasured, tasks.budget, tasks.collaborators, null as bp, tasks.group, tasks.id, tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."')a order by ident");
        $users = User::all();
        $groups = Group::all();
        $nameBP=$bp[$idbp-1]->name;
        $collabName = str_replace("%20", " ", $collabName);
        $collabFilter = DB::table('users')->where('name', '=', $collabName)->first();
        if ($collabFilter == null) {
            $collabFilter = DB::table('groups')->where('name', '=', $collabName)->first();
        }
        if ($collabFilter == null) {
            $filters = null;
        }
        else {
            $filters = array(
                "type" => "none",
                "collabs" => array($collabName),
                "leads" => "none",
                "groups" => "none",
                "objective" => null
            );
        }
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->hasRole('admin')) $permission = 4;
            else if ($user->hasRole('bpLead')) $permission = 3;
            else if ($user->hasRole('leader')) $permission = 2;
            else if ($user->hasRole('user')) $permission = 1;
            else $permission = 0;
        }
        else {
            $permission = 0;
        }
        $userId  = Auth::id();
        $thisUser = User::find($userId);
        if ($thisUser == null) $thisUser = (object) array("name" => "null");
        $thisGroups = DB::select("select distinct groups.name as name from groups, users where groups.user_ID = '".$userId."'");
        return view('businessPlan',compact('users', 'groups','bpPlans','idbp', 'filters', 'nameBP', 'permission', 'thisUser', 'thisGroups', 'bp'));
    }

    public function groupFilter ($idbp, $groupName){

        $bp = BusinessPlan::all();

        $bpPlans = DB::select("select * from (select  null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, goals.bp, goals.group, goals.id, null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, null as bp, objectives.group, objectives.id, null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select actions.userId, actions.progress, actions.date, actions.successMeasured, actions.budget, actions.collaborators, null as bp, actions.group, actions.id, actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select tasks.userId, tasks.progress, tasks.date, tasks.successMeasured, tasks.budget, tasks.collaborators, null as bp, tasks.group, tasks.id, tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."')a order by ident");
        $users = User::all();
        $groups = Group::all();
        $nameBP=$bp[$idbp-1]->name;
        $groupFilter = Group::find($groupName);
        if ($groupFilter == null) {
            $filters = null;
        }
        else {
            $filters = array(
                "type" => "none",
                "collabs" => "none",
                "leads" => "none",
                "groups" => array($groupFilter->name),
                "objective" => null
            );
        }
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->hasRole('admin')) $permission = 4;
            else if ($user->hasRole('bpLead')) $permission = 3;
            else if ($user->hasRole('leader')) $permission = 2;
            else if ($user->hasRole('user')) $permission = 1;
            else $permission = 0;
        }
        else {
            $permission = 0;
        }
        $userId  = Auth::id();
        $thisUser = User::find($userId);
        if ($thisUser == null) $thisUser = (object) array("name" => "null");
        $thisGroups = DB::select("select distinct groups.name as name from groups, users where groups.user_ID = '".$userId."'");
        return view('businessPlan',compact('users', 'groups','bpPlans','idbp', 'filters', 'nameBP', 'permission', 'thisUser', 'thisGroups', 'bp'));
    }

    public function objectiveFilter ($idbp, $objectiveId) {
        $bp = BusinessPlan::all();

        $bpPlans = DB::select("select * from (select  null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, goals.bp, goals.group, goals.id, null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, null as bp, objectives.group, objectives.id, null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select actions.userId, actions.progress, actions.date, actions.successMeasured, actions.budget, actions.collaborators, null as bp, actions.group, actions.id, actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select tasks.userId, tasks.progress, tasks.date, tasks.successMeasured, tasks.budget, tasks.collaborators, null as bp, tasks.group, tasks.id, tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."')a order by ident");
        $users = User::all();
        $groups = Group::all();
        $nameBP=$bp[$idbp-1]->name;
        $objectiveFilter = Objective::findOrFail($objectiveId);
        if ($objectiveFilter == null) {
            $filters = null;
        }
        else {
            $filters = array(
                "type" => "none",
                "collabs" => "none",
                "leads" => "none",
                "groups" => "none",
                "objective" => $objectiveFilter
            );
        }
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->hasRole('admin')) $permission = 4;
            else if ($user->hasRole('bpLead')) $permission = 3;
            else if ($user->hasRole('leader')) $permission = 2;
            else if ($user->hasRole('user')) $permission = 1;
            else $permission = 0;
        }
        else {
            $permission = 0;
        }
        $userId  = Auth::id();
        $thisUser = User::find($userId);
        if ($thisUser == null) $thisUser = (object) array("name" => "null");
        $thisGroups = DB::select("select distinct groups.name as name from groups, users where groups.user_ID = '".$userId."'");
        return view('businessPlan',compact('users', 'groups','bpPlans','idbp', 'filters', 'nameBP', 'permission', 'thisUser', 'thisGroups','bp'));
    }
  public function createBP()
  {
    $bp = BusinessPlan::all();
    $counted = count($bp)+1;
    //$groups = Group::lists('name');
    //$counted = count($goals)+1;
    return view('businessPlan.createBP',compact('counted'));
  }
  public function createGoal($idbp)
  {
    $bp = BusinessPlan::lists('name');
    $goals = Goal::all();
    $groups = Group::lists('name');
   // $counted = count($goals)+1;
    $counted = (DB::table('goals')->max('id'))+1;
    
  	return view('businessPlan.createGoal',compact('counted','groups','bp','idbp'));
  }

  public function createObjective($idbp)
  {
   //$goals = Goal::lists('name');
    $goals = DB::table('goals')->where ('bpid',$idbp)->pluck('name');
    $objective = Objective::all();
    //$groups = Group::lists('name');
    $counted = count($objective)+1;
    return view('businessPlan.createObjective',compact('goals','counted','groups','idbp'));
  }


    public function createAction($idbp)
  {
    $objectives= DB::table('objectives as o')
      ->join('goals as g',function ($join) use ($idbp){
        $join->on('o.goal_id','=','g.id')
          ->where('g.bpid','=',$idbp);
      })
      ->distinct()
      ->pluck('o.name');
    $action = Action::all();
    $groups = Group::lists('name');
    $user = User::lists('name');
    $counted = count($action)+1;
    $selectedUsers = array();
    $selectedGroups = array();
    $users = User::lists('name', 'id');

     $progress = ['0' => 'Not Started', '1' => 'In Progress', '2' => 'Done'];  
      
        
    return view('businessPlan.createAction',compact('objectives','counted','groups','user','idbp','users','selectedUsers','selectedGroups','progress'));
  }


    public function createTask($idbp)
  {
        $actions= DB::table('actions as a')
        ->join('objectives as o',function ($join) use ($idbp){
            $join->on('a.objective_id','=','o.id');
          })
        ->join('goals as g',function ($join2) use ($idbp){
            $join2->on('o.goal_id','=','g.id')
              ->where('g.bpid','=',$idbp);
          })    
      ->distinct()
      ->pluck('a.description');

    $task = Task::all();
    $groups = Group::lists('name');
    $user = User::lists('name');
    $counted = count($task)+1;
    $users = User::lists('name', 'id');
    $selectedUsers = array();
    $selectedGroups = array();
    $progress = ['0' => 'Not Started', '1' => 'In Progress', '2' => 'Done'];
    return view('businessPlan.createTask',compact('actions','counted','groups','user','idbp','users','selectedUsers','selectedGroups','progress'));
  }
   public function store()
   {
       $redirectID;
       $input = Request::all();
       
               if (Request::has('created')) {
                    $redirectID=$input['id'];
                    BusinessPlan::create($input);
               }
               if (Request::has('bpid')) {

                   if($input['bp']=='False')  $input['bp']=True;
                   else   $input['bp']=False;
                    $input['group'] += 1;
                   
                    Goal::create($input);
                    $redirectID = $input['bpid'];
               }
               if (Request::has('goal_id')) {
                  
                  // return  $input['goal_id'];
                   $goals = DB::select("select * from goals where bpid = '".$input['idbp']."'");
                   $input['goal_id'] =$goals[$input['goal_id']]->id;
                  
                   $objectiveIdent = count(DB::table('objectives')->where('goal_id', $input['goal_id'])->get())+1;
                   $goalIdent = $input['goal_id'];
                   $input['ident'] ="$goalIdent.$objectiveIdent";
                   $redirectIDArray = DB::table('goals')-> where('id',$input['goal_id'])->pluck('bpid');
                   $redirectID=$redirectIDArray[0];
                   Objective::create($input);


               }
               if (Request::has('objective_id')) {
                   $input['group'] += 1;
                   $objectives = DB::select("select distinct * from goals, objectives where bpid = '".$input['idbp']."' and objectives.goal_id = goals.id");
                   $input['objective_id'] =$objectives[$input['objective_id']]->id;
                   $input['userId'] += 1; 
                   $objectiveIdent = DB::table('objectives')->where('id', $input['objective_id'])->pluck('ident');
                   $actionIdent = count(DB::table('actions')->where('objective_id', $input['objective_id'])->get())+1;
                   $input['ident'] = "$objectiveIdent[0].$actionIdent";  
                   $var2 = $input['idbp'];
                  $redirectIDArray= DB::table('goals as g')
                    ->join('objectives as o',function ($join) use ($var2){
                    $join->on('o.goal_id','=','g.id')
                    ->where('g.bpid','=',$var2);
                    })
                ->distinct()
                ->pluck('g.bpid');
                  $redirectID= $redirectIDArray[0];
                   $collabs = "";
        if (array_key_exists('collaborators-groups', $input)) {
            foreach ($input['collaborators-groups'] as $x) {
                $group = Group::find($x);
                if ($group != null) {
                    $collabs .= Group::find($x)->name;
                    $collabs .= ", ";
                }
                else {
                    $collabs .= "";
                }
            }
        }
        if (array_key_exists('collaborators-users', $input)) {
            foreach ($input['collaborators-users'] as $x) {
                $user = User::find($x);
                if ($user != null){
                    $collabs .= User::find($x)->name;
                    $collabs .= ", ";
                }
                else {
                    $collabs .= "";
                }
            }
        }
        $collabs = rtrim($collabs, ", ");
        $input['collaborators'] = $collabs;
                   Action::create($input);
               }
               
               if (Request::has('action_id')) {
                   $input['group'] += 1;
                   $actions = DB::select("select distinct * from goals, objectives,actions where bpid = '".$input['idbp']."' and objectives.goal_id = goals.id and actions.objective_id = objectives.id");
                   $input['action_id'] =$actions[$input['action_id']]->id;
                   $input['userId'] += 1; 
                   $actionIdent = DB::table('actions')->where('id', $input['action_id'])->pluck('ident');
                   $taskIdent = count(DB::table('tasks')->where('action_id', $input['action_id'])->get())+1;
                   $input['ident'] = "$actionIdent[0].$taskIdent";
                   $var2 = $input['idbp'];

                  $redirectIDArray= DB::table('goals as g')
       
        ->join('objectives as o',function ($join2) use ($var2){
            $join2->on('o.goal_id','=','g.id')
              ->where('g.bpid','=',$var2);
          })   
              ->join('actions as a',function ($join){
                    $join->on('a.objective_id','=','o.id');
          })
                ->distinct()
                ->pluck('g.bpid');
                  $redirectID= $redirectIDArray[0];

             $collabs = "";
        if (array_key_exists('collaborators-groups', $input)) {
            foreach ($input['collaborators-groups'] as $x) {
                $group = Group::find($x);
                if ($group != null) {
                    $collabs .= Group::find($x)->name;
                    $collabs .= ", ";
                }
                else {
                    $collabs .= "";
                }
            }
        }
        if (array_key_exists('collaborators-users', $input)) {
            foreach ($input['collaborators-users'] as $x) {
                $user = User::find($x);
                if ($user != null){
                    $collabs .= User::find($x)->name;
                    $collabs .= ", ";
                }
                else {
                    $collabs .= "";
                }
            }
        }
              $collabs = rtrim($collabs, ", ");
              $input['collaborators'] = $collabs;
                   Task::create($input);
               }


               return redirect("businessplan/".$redirectID."");
           
       
   }
   public function editBP($id)
   {
      $bp = BusinessPlan::findOrFail($id);
      //$counted = BusinessPlan::all();
    //$groups = Group::lists('name');
     //$counted = count($counted)+1;
      return view('businessPlan.editBP',compact('bp'));
   }
   public function editGoal($idbp, $id)
   {

      //$bp = BusinessPlan::findOrFail($idbp);
      $goal = Goal::findOrFail($id);
      $groups = Group::lists('name');
      $bp = BusinessPlan::lists('name');
  
      return view('businessPlan.editGoal',compact('goal','groups','bp', 'idbp'));
   }
   public function editObjective($idbp,$id)
   {
   
      $objective = Objective::findOrFail($id);
      $goals = Goal::lists('name');
      $groups = Group::lists('name');
      return view('businessPlan.editObjective',compact('objective','goals','groups','idbp'));
   }
  public function editAction($idbp,$id)
   {
    
      $action = Action::findOrFail($id);
      $objectives = Objective::lists('name');

      $user = User::lists('name');
        $groups = Group::lists('name', 'id');
        $users = User::lists('name', 'id');

        $names = explode(', ', $action->collaborators);
        $selectedUsers = array();
        $selectedGroups = array();
        foreach ($names as $name) {
            if (count(User::all()->where('name', $name)) > 0) {
                array_push($selectedUsers, User::all()->where('name', $name)->first()->id);
            }
            if (count(Group::all()->where('name', $name)) > 0) {
                array_push($selectedGroups, Group::all()->where('name', $name)->first()->id);
            }
        }
      $progress = ['0' => 'Not Started', '1' => 'In Progress', '2' => 'Done'];
      return view('businessPlan.editAction',compact('action','objectives','groups','user','idbp','users','selectedUsers','selectedGroups','progress'));
   }
   public function editTask($idbp,$id)
   {
       $bp = BusinessPlan::findOrFail($idbp);
      $task = Task::findOrFail($id);
      $actions = Action::lists('description');
      $user = User::lists('name');
        $groups = Group::lists('name', 'id');
        $users = User::lists('name', 'id');

        $names = explode(', ', $task->collaborators);
        $selectedUsers = array();
        $selectedGroups = array();
        foreach ($names as $name) {
            if (count(User::all()->where('name', $name)) > 0) {
                array_push($selectedUsers, User::all()->where('name', $name)->first()->id);
            }
            if (count(Group::all()->where('name', $name)) > 0) {
                array_push($selectedGroups, Group::all()->where('name', $name)->first()->id);
            }
        }
        $progress = ['0' => 'Not Started', '1' => 'In Progress', '2' => 'Done'];
      return view('businessPlan.editTask',compact('task','actions','groups','user','idbp','users','selectedUsers','selectedGroups','progress'));
   }
      public function updateBP($idbp)
   {
        $input = Request::all();
      $bp = BusinessPlan::findOrFail($idbp);
        $bp->update($input);
      
        return redirect("businessplan/".$idbp."");
    }

   public function update($idbp,$idb,$id)
   {

      $input = Request::all();
      if(Request::has('bp')){

      $bp = BusinessPlan::all();
      
      $bp->update($input);
      return redirect("businessplan/".$idbp."");
      }
      if (Request::has('goal')) {

        $goal = Goal::findOrFail($id);
 
        $goal->update($input);
      }
      if (Request::has('objective')) {
        $objective = Objective::findOrFail($id);
        $input['group'] += 1; 
        $objective->update($input);
      }
      if (Request::has('action')) {
        $collabs = "";
        if (array_key_exists('collaborators-groups', $input)) {
            foreach ($input['collaborators-groups'] as $x) {
                $group = Group::find($x);
                if ($group != null) {
                    $collabs .= Group::find($x)->name;
                    $collabs .= ", ";
                }
                else {
                    $collabs .= "";
                }
            }
        }
        if (array_key_exists('collaborators-users', $input)) {
            foreach ($input['collaborators-users'] as $x) {
                $user = User::find($x);
                if ($user != null){
                    $collabs .= User::find($x)->name;
                    $collabs .= ", ";
                }
                else {
                    $collabs .= "";
                }
            }
        }
        $collabs = rtrim($collabs, ", ");
        $input['collaborators'] = $collabs;
        //return  $input['collaborators'];
        $action = Action::findOrFail($id);
        $input['group'] += 1;
        $input['userId'] += 1; 
        $action->update($input);
      }
      if (Request::has('task')) {
        $collabs = "";
        if (array_key_exists('collaborators-groups', $input)) {
            foreach ($input['collaborators-groups'] as $x) {
                $group = Group::find($x);
                if ($group != null) {
                    $collabs .= Group::find($x)->name;
                    $collabs .= ", ";
                }
                else {
                    $collabs .= "";
                }
            }
        }
        if (array_key_exists('collaborators-users', $input)) {
            foreach ($input['collaborators-users'] as $x) {
                $user = User::find($x);
                if ($user != null){
                    $collabs .= User::find($x)->name;
                    $collabs .= ", ";
                }
                else {
                    $collabs .= "";
                }
            }
        }
        $collabs = rtrim($collabs, ", ");
        $input['collaborators'] = $collabs;
        $task = Task::findOrFail($id);
        $input['group'] += 1;
        $input['userId'] += 1; 
        $task->update($input);
      }
    return redirect("businessplan/".$idbp."");
   }


    function deleteGoal ($idbp,$id) {


Log::info('This is some useful information.');
Log::info($id);
        Goal::findOrFail($id)->delete();
        return;
    }
    function deleteObjective ($idbp,$id) {
        Objective::findOrFail($id)->delete();
        return;
    }
    function deleteAction ($idbp,$id) {
        Action::findOrFail($id)->delete();
        return;
    }
    function deleteTask ($idbp, $id) {
        Task::findOrFail($id)->delete();
        return;
    }
}

       