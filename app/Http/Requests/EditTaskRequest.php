<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;
use App\Group;
class EditTaskRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $taskid = $this->route('id');
        if (Auth::check())
            Return (Auth::user()->id == Task::find($taskid)->userId || User::find(Auth::id())->hasRole('bpLead')
                || User::find(Group::find(Task::find($taskid)->group)->user_ID)->id == Auth::id());
        else {
            Return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
