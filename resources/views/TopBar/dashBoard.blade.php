@extends('layouts.app')

@section('content')
<div class="container">
    <!--TODO work on dashboard -->
    This is where our dashBoard page goes!
    <div class="tasksTable">
        <h2>My Tasks</h2>
        <ul>
            @foreach($tasks as $task)
                <li>{{$task->description}}</li>
            @endforeach
        </ul>
    </div>
</div>
@stop