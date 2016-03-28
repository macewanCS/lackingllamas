@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/taskComments.css') !!}
@stop

@section('content')
    <div class="task-container">
        @if (Auth::check())
            @if ($task->userId == Auth::id())

                <a class="edit" href="{{ url('/task',$task->id) }}/edit">
                    {{ HTML::image('pictures/pen.png', 'picture', ['class'=>'edit-image']) }}
                </a>
            @endif
        @endif
        <div class="task-description-container">
            <div class="task-description-inner">
                <div class="task-name">
                    <h1>{{$task->description}}</h1>
                </div>
                <ul class="task-list">

                    <li><div class="task-action"> <label>Action </label> <a href="{{url('/action', $task->action_id)}}"> {{\App\Action::findOrFail($task->action_id)->description}} </a></div></li>

                    <li><div class="task-lead"><label>Lead </label><a href="{{url('/businessplan')}}"> {{\App\User::find($task->userId)->name}}</a> </div></li><!-- TODO: Link to businessplan filtered by lead -->

                    <li><div class="task-collab">
                            <label>Collaborators </label>

                            @if (empty($task->collaborators))
                                N/A
                            @else
                                @foreach (explode(', ', $task->collaborators) as $colab)
                                    <a href="{{url('/businessplan')}}"> {{ $colab }} </a> <!-- TODO: Link to businessplan filtered by collabs -->
                                @endforeach
                            @endif

                        </div></li>

                    <li><div class="task-date">
                            <label>Due </label> <p>{{str_limit($task->date, $limit = 10, $end ='')}} </p>
                            @if ($task->date < \Carbon\Carbon::now())
                                <style media="screen" type="text/css">
                                    .task-date p {
                                        color: #FF4136;
                                    }
                                </style>
                            @endif
                        </div></li>

                    <li><div class="task-budget">
                            <label>Budget </label> <p>${{$task->budget}}</p>
                        </div></li>

                    <li><div class="task-success">
                            <label>Success Measured </label> <p>
                                @if (empty($task->successMeasured))
                                    N/A
                                @else
                                    {{$task->successMeasured}}
                                @endif</p>
                        </div></li>

                    <li><div class="task-progress">
                            <label>Progress </label> <p>
                                @if (empty($task->progress))
                                    Not Started
                                @else
                                    {{$task->progress}}
                                @endif
                            </p></div></li>

                </ul>

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
                                <div class="comment-name"><a href="{{url('/businessplan')}}">{{\App\User::findOrFail($comment->user_ID)->name}} </a></div> commented {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}
                            </div>
                            <div class="comment-content">
                                <br>
                                {{$comment->description}}
                            </div>
                        </li>
                    @endforeach
                </div>
            </ul>
            @if (!Auth::guest())
                <div class="comment-form">

                    {!! Form::open(array('action' => array('TaskCommentsController@store', $task->id))) !!}

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
            @endif
        </div>
    </div>
@stop