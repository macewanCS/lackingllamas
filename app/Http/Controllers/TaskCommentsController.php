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
use Illuminate\Support\Facades\Auth;

class TaskCommentsController extends Controller
{
    public function __construct() {}
    public function taskComments($id)
    {
        $taskComment = new TaskComments;
        $comments = $taskComment->getComments($id);
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
    public function editTaskFromComments($id, Requests\EditTaskRequest $request)
    {
        $task = Task::findOrFail($id);
        $actions = Action::lists('description');
        $groups = Group::lists('name');
        $user = User::lists('name');

        return view('editTaskComments',compact('task','actions','groups','user'));
    }
    public function updateTask($id, Request $request)
    {
        $input = $request->all();
        $taskComment = new TaskComments;
        $comments = $taskComment->getComments($id);
        $task = Task::findOrFail($id);
        $task->update($input);

        return view('task', compact('comments', 'task'));
    }

}
