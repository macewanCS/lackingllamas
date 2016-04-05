<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Action;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Group;

class EditActionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $actionid = $this->route('id');
        if (Auth::check())
            Return (Auth::user()->id == Action::find($actionid)->userId || User::find(Auth::id())->hasRole('bpLead')
                || User::find(Group::find(Action::find($actionid)->group)->user_ID)->id == Auth::id());
        else {
            return false;
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
