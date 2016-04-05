<?php

namespace App\Http\Controllers;

use App\BusinessPlan;
use App\Roster;
use Illuminate\Http\Request;
use App\Group;
use App\Action;
use App\Objective;
use App\Goal;
use App\Task;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function __construct() {}

    public function groups() {
        $bp = BusinessPlan::all();
        $bpid = count($bp);
        $groups = Group::all();
        $tasks = array();
        $actions = array();
        foreach(BusinessPlan::all() as $x) {
            array_push($tasks, DB::select("select t.* from tasks t, actions a, objectives o, goals g, business_plans b where t.action_id = a.id and a.objective_id = o.id and o.goal_id = g.id and g.bpid = b.id and b.id = $x->id"));
            array_push($actions, DB::select("select a.* from actions a, objectives o, goals g, business_plans b where a.objective_id = o.id and o.goal_id = g.id and g.bpid = b.id and b.id = $x->id"));
        }
        $users = User::all();
        $rosters = Roster::all();
        $businessPlans = BusinessPlan::lists('name', 'id');
        return view('groups', compact('groups', 'actions', 'tasks', 'users', 'rosters', 'businessPlans', 'bpid'));
    }
}
