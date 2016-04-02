<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\TaskComments;
use App\Task;
use App\Action;
use App\Group;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TaskCommentsController extends Controller
{
    public function __construct() {}
    public function taskComments($id)
    {
        $taskComment = new TaskComments;
        $model = new Task;
        $comments = $taskComment->getComments($id);
        $task = Task::findOrFail($id);
        $users = array();
        $roster = DB::table('rosters')->select('user_ID')->where('group_ID','=', $task->group)->get();
        foreach ($roster as $x)
            array_push($users, $x->user_ID);
        $groupLead = User::find(Group::find($task->group)->user_ID)->id;
        if(Auth::check()) {
            $user = User::find(Auth::id());
            $permission = $user->hasRole('bpLead');
        } else {
            $permission = false;
        }
        $businessplan = $model->getBpIdFromTask($id);

        return view('task', compact('comments', 'task', 'users', 'permission', 'groupLead', 'businessplan'));
    }

    public function store($task_id, Requests\CommentTaskRequest $request)
    {
        $input = $request->all();
        $input['user_ID'] = Auth::user()->id;
        $input['task_ID'] = $task_id;
        TaskComments::create($input);

        return Redirect::back()->with('message', 'Your comment was posted');
    }
    public function editTaskFromComments($id, Requests\EditTaskRequest $request)
    {
        $model = new Task;
        $task = Task::findOrFail($id);
        $groups = Group::lists('name', 'id');
        $users = User::lists('name', 'id');
        $bpid = $model->getBpIdFromTask($id);
        $action = Action::find($task->action_id)->description;
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

        return view('editTaskComments',compact('task','action','groups','users', 'bpid', 'selectedUsers', 'selectedGroups'));
    }
    public function updateTask($id, Request $request)
    {
        $collabs = "";
        $input = $request->all();
        $taskComment = new TaskComments;
        $model = new Task;
        $comments = $taskComment->getComments($id);
        $task = Task::findOrFail($id);
        $users = array();
        $roster = DB::table('rosters')->select('user_ID')->where('group_ID','=', $task->group)->get();
        foreach ($roster as $x)
            array_push($users, $x->user_ID);
        $groupLead = User::find(Group::find($task->group)->user_ID)->id;
        if(Auth::check()) {
            $user = User::find(Auth::id());
            $permission = $user->hasRole('bpLead');
        } else {
            $permission = false;
        }
        $businessplan = $model->getBpIdFromTask($id);
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
        $task->update($input);

        return view('task', compact('comments', 'task', 'users', 'permission', 'groupLead', 'businessplan'));
    }

}
