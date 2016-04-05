@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/actionComments.css') !!}
    {!! Html::style('css/style.css') !!}
@stop

@section('content')
    <div class="action-container">
        @if (Auth::check())
            @if ($action->userId == Auth::id() || $permission == true || $groupLead == Auth::id())

                <a class="edit" href="{{ url('/action',$action->id) }}/edit">
                    {{ HTML::image('pictures/pen.png', 'picture', ['class'=>'edit-image']) }}
                </a>
            @endif
        @endif
        <div class="action-description-container">
            <div class="action-description-inner">
                <div class="action-name">
                    <h1>{{$action->description}}</h1>

                </div>
                <ul class="action-list">

                    <li><div class="action-objective">
                            <label>Objective</label><a href="{{url('/businessplan/' .  $businessplan . '/Objective/' . $action->objective_id)}}"> <span>O</span>{{str_limit(\App\Objective::find($action->objective_id)->name, $limit=75, $end = '...')}} </a></div></li>

                    <li><div class="action-tasks"><label>Tasks </label>
                            <?php $tmp = 0; ?>
                            @if(sizeof($tasks) < 1)
                                N/A
                            @elseif(sizeof($tasks) <= 2)
                                @foreach ($tasks as $task)
                                    <a href="{{url('/task', $task->id)}}"> <span>T</span>{{str_limit($task->description, $limit = 20, $end = '...')}}</a>
                                @endforeach
                                <style media="screen" type="text/css">
                                    .action-list li:nth-child(2) label {
                                        margin-top: 15px;
                                    }
                                </style>

                            @endif
                            @if (sizeof($tasks) > 2)
                                @foreach($tasks as $task)
                                    @if ($tmp++ < 2)
                                        <a href="{{url('/task', $task->id)}}"> <span>T</span>{{str_limit($task->description, $limit = 20, $end = '...')}}</a>
                                    @endif
                                @endforeach
                                <a class="view-all-tasks" href="{{url('/businessplan', $businessplan)}}">View all</a>
                                <style media="screen" type="text/css">
                                    .action-list li:nth-child(2) label {
                                        margin-top: 15px;
                                    }
                                </style>
                            @endif
                        </div></li>

                    <li><div class="action-lead"><label>Lead </label> <a href="{{url('/businessplan/'. $businessplan . '/user/' . $action->userId)}}">{{\App\User::find($action->userId)->name}} </a></div></li><!-- TODO: Link to businessplan filtered by lead -->

                    <li><div class="action-group-lead"><label>Group Lead</label><a href="{{url('/businessplan/' . $businessplan . "/group/" . $action->group)}}">{{\App\Group::find($action->group)->name}}</a></div></li>


                    <li><div class="action-collab">
                            <label>Collaborators </label>

                            @if (empty($action->collaborators))
                                N/A
                            @else
                                @foreach (explode(', ', $action->collaborators) as $colab)
                                    <a href="{{url('/businessplan/' . $businessplan . "/collab/" . $colab)}}">{{ $colab }}</a>,
                                @endforeach
                            @endif

                        </div></li>

                    <li><div class="action-date">
                            <label>Due </label> <p>{{str_limit($action->date, $limit = 10, $end ='')}} </p>
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
                                @if (empty($action->progress) || $action->progress == 0)
                                    Not Started
                                @endif
                                @if ($action->progress == 1)
                                    In Progress
                                @endif
                                @if ($action->progress >= 2)
                                    Done
                                    <style media="screen" type="text/css">
                                        .action-progress p {
                                            color: green;
                                        }
                                    </style>
                                @endif
                            </p></div></li>
                </ul>

                <br>
                <div class="comments-header">
                    <h3>Comments</h3>
                </div>
            </div>
            <hr>
            <ul class="comment-container">
                <div class="action-comments-inner">
                    @if(count($comments))
                        @foreach($comments as $comment)
                            <li class="comments">
                                <div class="comment-header">
                                    <div class="comment-name"><a href="{{url('/businessplan/'. $businessplan . '/user/' . $comment->user_ID)}}">{{\App\User::findOrFail($comment->user_ID)->name}}</a></div> commented {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}
                                </div>
                                <div class="comment-content">
                                    <br>
                                    {{$comment->description}}
                                </div>
                            </li>
                        @endforeach
                    @else
                        <div class="comment-content">
                            No Comments
                        </div>
                    @endif
                </div>
            </ul>
            @if ( (Auth::id() == $action->userId) == true || (array_search(strval(Auth::id()), $users, true)) !== false || $permission == true || $groupLead == Auth::id())
                <div class="comment-form">
                    {!! Form::open(array('action' => array('ActionCommentsController@store', $action->id))) !!}

                    {!! Form::label('description','Leave a Comment ', ['class' => 'comment-label']) !!}<br>
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
            @else
                <style>
                    .comment-container {margin-bottom:20%;}
                </style>
            @endif
        </div>
    </div>
@stop

@section('scripts')
    {!! Html::script('javascript/jquery-2.0.3.min.js') !!}
@stop