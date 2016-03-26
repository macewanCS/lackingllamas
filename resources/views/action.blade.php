@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/actionComments.css') !!}
@stop

@section('content')

    <div class="action-container">
        @if ($action->userId == Auth::id())
            <span class="edit"><button type="edit-button">Edit Action</button> </span>
        @endif
        <div class="action-description-container">
            <div class="action-description-inner">
                <div class="action-name">
                    <h1>{{$action->description}}</h1>

                </div>
                <ul class="action-list">

                    <li><div class="action-objective">
                            <label>Objective</label><a href="{{url('/businessplan')}}"> {{\App\Objective::find($action->objective_id)->name}} </a></div></li>

                    <li><div class="action-lead"><label>Lead </label><a href="{{url('/profile')}}"> {{\App\User::find($action->userId)->name}} </a> </div></li><!-- TODO: Link to profiles -->

                    <li><div class="action-tasks"><label>Tasks </label>
                            @if(sizeof($tasks) < 1)
                                N/A
                            @else
                                @foreach ($tasks as $task)
                                    <a href="{{url('/task', $task->id)}}"> {{str_limit($task->description, $limit = 20, $end = '...')}}</a>
                                @endforeach
                            @endif
                        </div></li>
                    <li><div class="action-collab">
                            <label>Collaborators </label>

                            @if (empty($action->collaborators))
                                N/A
                            @else
                                @foreach (explode(', ', $action->collaborators) as $colab)
                                    <a href="{{url('/profile')}}"> {{ $colab }} </a> <!-- TODO: Link to collab's profiles -->
                                @endforeach
                            @endif

                        </div></li>

                    <li><div class="action-date">
                            <label>Due </label> <p>{{$action->date}} </p>
                            @if ($action->date < \Carbon\Carbon::now())
                                <style media="screen" type="text/css">
                                    .action-date p {
                                        color: #FF4136;
                                    }
                                </style>
                            @endif
                        </div></li>

                    <li><div class="action-budget">
                            <label>Budget </label> <p>${{$action->budget}}</p>
                        </div></li>

                    <li><div class="action-success">
                            <label>Success Measured </label> <p>
                                @if (empty($action->successMeasured))
                                    N/A
                                @else
                                    {{$action->successMeasured}}
                                @endif</p>
                        </div></li>

                    <li><div class="action-progress">
                            <label>Progress </label> <p>
                                @if (empty($action->progress))
                                    Not Started
                                @else
                                    {{$action->progress}}
                                @endif
                            </p></div></li>

                </ul>


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
                {!! Form::open(array('action' => array('ActionCommentsController@store', $action->id))) !!}

                {!! Form::label('description','Leave a Comment: ', ['class' => 'comment-label']) !!}<br>
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