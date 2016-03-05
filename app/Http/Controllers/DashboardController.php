<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function dashBoard()
    {
        $tasks = Task::latest('date')->get();//tasks sorted by date TODO give only users tasks
        return view('dashBoard', compact('tasks'));
    }
}
