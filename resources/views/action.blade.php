@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/actionComments.css') !!}
@stop

@section('content')
    <div class="action-container">
        <div class="action-description-container">
            <div class="action-description-inner">

                <div class="action-name">
                    <h1>{{$action->description}}</h1>
                </div>
                <div class="action-collab">
                    Collaborators: {{$action->collaborators}}
                </div>

                <div class="action-date">
                    Due: {{$action->date}}
                </div>

                <div class="action-objective"> Belongs to Objective: {{\App\Objective::findOrFail($action->objective_id)->name}}</div>
                <div class="action-tasks">
                    Tasks:
                </div>
                <div class="comments-header">
                    <h3>Comments</h3>
                </div>
            </div>
            <hr>
            <ul class="comment-container">
                <div class="action-comments-inner">
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
                {!! Form::open(array('action' => array('ActionCommentsController@store', $action->id))) !!}

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