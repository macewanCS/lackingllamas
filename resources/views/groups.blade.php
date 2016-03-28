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
                    @foreach($groups as $group)
                        <a href="#" id="link-result" onclick="display(this,'{{$users->find($group->user_ID)->name}}' ,'{{$group->description}}', '{{$group->budget}}', '{{json_encode($actions)}}', '{{json_encode($users)}}', '{{$group->id}}');return false;">{{$group->name}}</a>
                        <br>
                    @endforeach
                </div>
            </div>

            <div class="roster-container">
                <h2 id="group-name">{{$groups[0]['name']}}</h2>
                <hr>
                <div id="group-lead">Lead: {{$users->find($groups[0]['user_ID'])->name}}</div>
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
        function display(element, lead, description, budget, actions, users, id) {

            var $name = element.innerHTML;
            var headerText = document.getElementById("group-name");
            var descriptionText = document.getElementById("group-description");
            var leadText = document.getElementById("group-lead");
            var budgetText = document.getElementById("group-budget");
            var actionText = document.getElementById("group-actions");
            var actionsArray = JSON.parse(actions);
            var usersArray = JSON.parse(users);
            var actionContent = '';
            for (var i = 0; i < actionsArray.length; i++)
                if (actionsArray[i].group == id)
                        actionContent+="<div class='action-content'>" + actionsArray[i].description + "</div>";

            actionText.innerHTML = "Actions: " + actionContent;
            headerText.innerHTML = $name;
            descriptionText.innerHTML = "Description: " + description;
            budgetText.innerHTML = "Budget: " + budget;
            leadText.innerHTML = "Lead: " + lead;
        }
    </script>
@stop