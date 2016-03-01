@extends('layouts.app')

@section('content')
<div class="container">
    <!--TODO work on dashboard -->
    This is where our dashBoard page goes!
    <div class="tasksTable">
        <h2>My Tasks</h2>
        <ul>
            @foreach($tasks as $task)
                <li>
                    <div class="taskDescription">{{$task->description}}</div>
                    <div class="taskDate">{{ $task->date}}</div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@stop