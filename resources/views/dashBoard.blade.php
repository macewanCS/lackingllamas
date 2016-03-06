@extends('layouts.app')

@section('content')
    {!! Html::style('css/dashboard.css') !!}
<div class="container-dashboard">
    <!--TODO work on dashboard -->
    <div class="tasksTable">
        <h2>My Tasks</h2>
        <ul>
            @foreach($tasks as $task)
                <li>
                    <div class="taskDescription">{{$task->description}}</div>
                    <div class="taskDate">{{ \Carbon\Carbon::parse($task->date)->diffForHumans()}}</div>
                </li>
            @endforeach
        </ul>
        <div class ="tasksBtn"><a href="{{ url('/mytasks') }}">View All</a></div>


    </div>

    <div class="teamsTable">
        <h2>My Teams & Departments</h2>
        <ul>
            <!-- TODO Add teams & departments dynamically to the dashboard -->
            <li>IT Services Department</li>
            <li>Events Team</li>
        </ul>

    </div>
</div>
    <hr>

@stop