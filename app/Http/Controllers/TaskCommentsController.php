<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\TaskComments;
use App\Task;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentsController extends Controller
{
    public function taskComments($id)
    {
        $taskComment = new TaskComments;
        $comments = $taskComment->getComments($id);
        //$comments = TaskComments::lists('description')->where('task_ID', $id)->all();
        $task = Task::findOrFail($id);

        return view('task', compact('comments', 'task'));
    }

    public function store($task_id, Requests\CommentTaskRequest $request)
    {
        $input = $request->all();
        $input['user_ID'] = Auth::user()->id;
        $input['task_ID'] = $task_id;
        TaskComments::create($input);

        return Redirect::back()->with('message', 'Your comment was posted');
    }
}
