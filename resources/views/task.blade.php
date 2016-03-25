@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/taskComments.css') !!}
@stop

@section('content')
    <div class="task-container">
    <div class="task-description-container">
        <div class="task-description-inner">

        <div class="task-name">
            <h1>{{$task->description}}</h1>
        </div>
        <div class="task-collab">
            Collaborators: {{$task->collaborators}}
        </div>

        <div class="task-date">
            Due: {{$task->date}}
        </div>

            <div class="task-budget">
                Budget: ${{$task->budget}}
            </div>

            <div class="task-success">
                Success Measured: {{$task->successMeasured}}
            </div>

            <div class="task-lead">
                Lead: {{\App\User::findOrFail($task->userId)->name}}
            </div>

            <div class="task-progress">
                Progress: {{$task->progress}}
            </div>

            <div class="task-action"> Belongs to Action:<a href="{{url('/action', $task->action_id)}}"> {{\App\Action::findOrFail($task->action_id)->description}} </a></div>

            <div class="comments-header">
                <h3>Comments</h3>
            </div>
        </div>
        <hr>
        <ul class="comment-container">
            <div class="task-comments-inner">
            @foreach($comments as $comment)
                <li class="comments">
                    <div class="comment-header">
                        <div class="comment-name">{{\App\User::findOrFail($comment->user_ID)->name}}</div> commented {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}
                    </div>
                    <div class="comment-content">
                        <br>
                        {{$comment->description}} 
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="comment-form">
            <h2> Commenting As {{Auth::user()->name}}</h2>
            {!! Form::open(array('action' => array('TaskCommentsController@store', $task->id))) !!}

            {!! Form::label('description','Leave a Comment: ') !!}<br>
            {!! Form::textarea('description', null, ['class' => 'comment-text-area']) !!}

            {!! Form::submit('Comment',['class'=>'comment-form-control']) !!}

            {!! Form::close() !!}
        </div>

        @if ($errors->any())
            <ul class="error-msg">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        </div>
    </div>
@stop