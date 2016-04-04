@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/user.css') !!}
@stop

@section('content')
    <div class="user-container">
        <div class="user-description">
            <div class="user-description-inner">
                <div class="user-name">
                <h1>
                    {{$user->name}}
                </h1>
                    <hr>
                </div>
                <div class="user-role">
                    <label>Role</label> {{$user->roles[0]->display_name}}
                </div>

                <div class="user-groups">
                    <label>Groups</label>
                    @foreach($groups as $group)
                        <a href="{{url('/businessplan', App\BusinessPlan::orderBy('created', 'desc')->first()->id )}}">{{$group->name}}</a>
                    @endforeach
                </div>

                <div class="user-tasks">
                    <a  href="{{url('/businessplan/'. App\BusinessPlan::orderBy('created', 'desc')->first()->id . '/user/' . $user->id)}}"><span>T</span>View Tasks</a>
                </div>
            </div>
        </div>
    </div>

@stop