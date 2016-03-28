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
                {!! Form::submit('Go',['class'=>'options-search-button']) !!}

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
                        <a href="#" id="link-result" onclick="display(this);return false;">{{$group}}</a>
                        <br>
                    @endforeach
                </div>
            </div>

            <div class="roster-container">
                <h2 id="group-name">{{$groups[0]['name']}}</h2>
                <hr>
                <div id="group-description">Description: {{$groups[0]['description']}}</div>
                <div id="group-budget">Budget: {{$groups[0]['budget']}}</div>
                <div id="group-actions">Actions: <br>
                @foreach ($actions as $action)
                    @if ($action->group == $groups[0]['id'])
                        {{$action->description}}
                        <br>
                    @endif
                @endforeach
                </div>
                <hr>
                @foreach ($rosters as $roster)
                    @if ($roster->group_ID == $groups[0]['id'])
                        <div class="roster-names">{{$users->find($roster->user_ID)->name}}</div>

                    @endif
                @endforeach
            </div>

        </div>

    </div>
    <script>
        function display(element) {
                var $name = element.innerHTML;
                var headerText = document.getElementById("group-name");
                headerText.innerHTML = $name;

        }
    </script>
@stop