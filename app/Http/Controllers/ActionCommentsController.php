<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Action;
use App\Task;
use App\Objective;
use App\Group;
use App\User;
use App\ActionComments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustPermission;

class ActionCommentsController extends Controller
{
    public function __construct() {}
    public function actionComments($id)
    {
        $actionComment = new ActionComments;
        $model = new Action;
        $comments = $actionComment->getComments($id);
        $action = Action::findOrFail($id);
        $tasks =  Task::all()->where('action_id', $id);
        $users = array();
        $roster = DB::table('rosters')->select('user_ID')->where('group_ID','=', $action->group)->get();
        foreach ($roster as $x)
            array_push($users, $x->user_ID);
        $groupLead = User::find(Group::find($action->group)->user_ID)->id;

        if (Auth::check()) {
            $user = User::find(Auth::id());
            $permission = $user->hasRole('bpLead');

        } else {
            $permission = false;
        }
        $businessplan = $model->getBpIdFromAction($id);


        return view('action', compact('comments', 'action', 'tasks', 'users', 'permission', 'groupLead', 'businessplan'));
    }

    public function store($action_id, Requests\CommentActionRequest $request)
    {
        $input = $request->all();
        $input['user_ID'] = Auth::user()->id;
        $input['action_ID'] = $action_id;
        ActionComments::create($input);

        return Redirect::back()->with('message', 'Your comment was posted');
    }
    public function editActionFromComments($id, Requests\EditActionRequest $request)
    {
        $model = new Action;
        $action = Action::findOrFail($id);
        $bpid = $model->getBpIdFromAction($id);
        $objective = Objective::find($action->objective_id)->name;
        $groups = Group::lists('name','id');
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

        return view('editActionComments',compact('action','objective','groups','users', 'bpid', 'selectedUsers', 'selectedGroups'));
    }

    public function updateAction($id, Request $request)
    {
        $collabs = "";
        $model = new Action;
        $input = $request->all();
        $actionComment = new ActionComments;
        $comments = $actionComment->getComments($id);
        $action = Action::findOrFail($id);
        $users = array();
        $roster = DB::table('rosters')->select('user_ID')->where('group_ID','=', $action->group)->get();
        foreach ($roster as $x)
            array_push($users, $x->user_ID);
        $groupLead = User::find(Group::find($action->group)->user_ID)->id;
        if(Auth::check()) {
            $user = User::find(Auth::id());
            $permission = $user->hasRole('bpLead');
        } else {
            $permission = false;
        }
        $businessplan = $model->getBpIdFromAction($id);
        foreach ($input['collaborators-groups'] as $x) {
            $collabs .= Group::find($x)->name;
            $collabs .= ", ";
        }
        foreach ($input['collaborators-users'] as $x) {
            $collabs .= User::find($x)->name;
            $collabs .= ", ";
        }
        $collabs = rtrim($collabs, ", ");
        $input['collaborators'] = $collabs;
        $action->update($input);
        $tasks =  Task::all()->where('action_id', $id);

        return view('action', compact('comments', 'action', 'tasks', 'users', 'permission', 'groupLead', 'businessplan'));
    }


}
