<?php

namespace App\Http\Controllers;
use View;
use App;
use App\BusinessPlan;
use App\Goal;
use App\Objective;
use App\Action;
use App\Task;
use App\User;
use App\Group;
use DB;
class PDFController extends Controller
{

public function show()
{
      $bp = BusinessPlan::all();
      $idbp = count($bp);
            $bpPlans = DB::select("select * from (select  null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, goals.group, goals. id, null as description, goals.name, goals.ident from goals ,business_plans where business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select null as userId, null as progress, null as date, null as successMeasured, null as budget, null as collaborators, objectives.group, objectives.id, null as description, objectives.name, objectives.ident from objectives, goals, business_plans where goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select actions.userId, actions.progress, actions.date, actions.successMeasured, actions.budget, actions.collaborators, actions.group, actions.id, actions.description, null as name, actions.ident from actions, objectives, goals, business_plans where objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."' union all select tasks.userId, tasks.progress, tasks.date, tasks.successMeasured, tasks.budget, tasks.collaborators, tasks.group, tasks.id, tasks.description, null as name, tasks.ident from tasks, actions, objectives, goals, business_plans where actions.id = tasks.action_id and objectives.id = actions.objective_id and goals.id = objectives.goal_id and business_plans.id = goals.bpid and business_plans.id = '".$idbp."')a order by ident");
                          $users = User::all();
              $groups = Group::all();
              $filters = null;


    $html = View::make('businessPlan.printBP',compact('users', 'groups','bpPlans','idbp','filters'))->render();
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML($html);
    return $pdf->stream();

}
}