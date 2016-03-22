<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Action;
use App\ActionComments;
use Illuminate\Support\Facades\Auth;

class ActionCommentsController extends Controller
{
    public function actionComments($id)
    {
        $actionComment = new ActionComments;
        $comments = $actionComment->getComments($id);

        $action = Action::findOrFail($id);

        return view('action', compact('comments', 'action'));
    }

    public function store($action_id, Requests\CommentActionRequest $request)
    {
        $input = $request->all();
        $input['user_ID'] = Auth::user()->id;
        $input['task_ID'] = $action_id;
        ActionComments::create($input);

        return Redirect::back()->with('message', 'Your comment was posted');
    }
}
