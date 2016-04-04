<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Group;
use App\Roster;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct() {}
    public function user($id) {
        $user = User::findOrFail($id);
        $groups =  DB::select("select b.name from rosters a, groups b, users c where a.user_ID = c.id and a.group_ID = b.id and c.id = $id");
        return view ('user', compact('user', 'groups'));

    }
}
