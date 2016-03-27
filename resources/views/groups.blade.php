@extends('layouts.app')
@section('endHead')
    {!! Html::style('css/groups.css') !!}
@stop
@section('content')
    <div class="groups-container">
        <div class="groups-container-inner">
            <div class="options-container">
                {!! Form::label('search','Search ', ['class' => 'options-search-bar']) !!}
                {!! Form::text('search', null, ['class' => 'options-search-field']) !!}


                <div class="options-checkboxes">
                    {!! Form::label('teamsBox','Teams ', ['class' => 'options-teams-box']) !!}
                    {!! Form::checkbox('teamsBox', 1, true) !!}

                    {!! Form::label('departmentsBox', 'Departments ', ['class' => 'options-departments-box']) !!}
                    {!! Form::checkbox('departmentsBox', 1, true) !!}
                </div>
                <br>
                <div class="search-results">
                    Results
                    <hr>
                    @foreach($groups->lists('name') as $group)
                        <br>
                        <a href="#" class="list-group">{{$group}}</a>
                    @endforeach
                </div>
            </div>

            <div class="roster-container">
                <h2>Roster</h2>
                <hr>
                <div class="group-name">{{$groups[0]['name']}}</div>
                <div class="group-description">Description: {{$groups[0]['description']}}</div>
                <div class="group-budget">Budget: {{$groups[0]['budget']}}</div>
                <div class="group-actions">Actions: <br>
                @foreach ($actions as $action)
                    @if ($action->group == $groups[0]['id'])
                        {{$action->description}}
                        <br>
                    @endif
                @endforeach
                </div>
                <hr>
                <!-- TODO: add migration for groups to connect users to groups -->
            </div>

            <div class="group-details">

            </div>
        </div>

    </div>
@stop