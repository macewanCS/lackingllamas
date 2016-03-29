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

class ActionCommentsController extends Controller
{
    public function __construct() {}
    public function actionComments($id)
    {
        $actionComment = new ActionComments;
        $comments = $actionComment->getComments($id);
        $action = Action::findOrFail($id);
        $tasks =  Task::all()->where('action_id', $id);

        return view('action', compact('comments', 'action', 'tasks'));
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
        $action = Action::findOrFail($id);
        $objectives = Objective::lists('name');
        $groups = Group::lists('name');
        $user = User::lists('name');
        return view('editActionComments',compact('action','objectives','groups','user'));
    }

    public function updateAction($id, Request $request)
    {
        $input = $request->all();
        $actionComment = new ActionComments;
        $comments = $actionComment->getComments($id);
        $action = Action::findOrFail($id);
        $action->update($input);
        $tasks =  Task::all()->where('action_id', $id);

        return view('action', compact('comments', 'action', 'tasks'));
    }


}
