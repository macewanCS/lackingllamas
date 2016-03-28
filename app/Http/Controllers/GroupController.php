<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Action;
use App\User;
use App\Http\Requests;

class GroupController extends Controller
{
    public function __construct() {}

    public function groups() {
        $groups = Group::all();
        $actions = Action::all();
        $users = User::all();
        return view('groups', compact('groups', 'actions', 'users'));
    }
}
