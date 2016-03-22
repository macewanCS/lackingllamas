@extends('layouts.app')

@section('endHead')

@stop

@section('content')
    <div id="task-container">

        <div class="task-name">
            {{$task->description}}
        </div>

        <div class="task-collab">
            {{$task->collaborators}}
        </div>

        <div class="task-date">
            {{$task->date}}
        </div>



        <div class="comment-container">
            @foreach($comments as $comment)
                <div class="comment-owner">
                    {{\App\User::findOrFail($comment->user_ID)->name}}
                </div>
                <div class="comment-content">
                    {{$comment->description}} <br>
                </div>
            @endforeach
        </div>

        <div class="comment-form">
            <h2> Commenting As {{Auth::user()->name}}</h2>
            {!! Form::open(array('action' => array('TaskCommentsController@store', $task->id))) !!}

            {!! Form::label('description','Leave a Comment: ') !!}<br>
            {!! Form::textarea('description') !!}

            {!! Form::submit('Comment',['class'=>'comment-form-control']) !!}

            {!! Form::close() !!}
        </div>

    </div>
@stop