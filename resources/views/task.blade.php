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
            @if ($comments->isEmpty())
                No comments
            @else
                @foreach($comment as $comments)
                    {{$comment->description}}
                @endforeach
            @endif
        </div>

        <div class="comment-form">
            <h2> Commenting As {{Auth::user()->name}}</h2>
            {!! Form::label('comment_description','Leave a Comment: ') !!}<br>
            {!! Form::textarea('comment_description') !!}

            {!! Form::submit('Comment',['class'=>'btn-primary-action form-control','data-toggle' => 'tooltip']) !!}
        </div>

    </div>
@stop