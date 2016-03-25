<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Action;
use App\Task;
use App\ActionComments;
use Illuminate\Support\Facades\Auth;

class ActionCommentsController extends Controller
{
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
}
