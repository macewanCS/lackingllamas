@extends('layouts.app')
@section('endHead')
    {!! Html::style('css/groups.css') !!}
@stop
@section('content')
    <div class="groups-container">
        <div class="groups-container-inner">
            <div class="options-container">
                <div class="options-checkboxes">
                    {!! Form::label('teamsBox','Teams ', ['class' => 'options-teams-box']) !!}
                    {!! Form::checkbox('teamsBox', 1, true) !!}

                    {!! Form::label('departmentsBox', 'Departments ', ['class' => 'options-departments-box']) !!}
                    {!! Form::checkbox('departmentsBox', 1, true) !!}
                </div>
                <br>
                <div>Select Group</div>
                <hr>
                <div id="search-results">
                    <ul class="result-list">
                    @foreach($groups as $group)
                        <li class="result-list-elem">
                            <a href="#" id="link-result" onclick="display(this,'{{$users->find($group->user_ID)->name}}' ,'{{$group->description}}', '{{$group->budget}}', '{{json_encode($actions)}}', '{{json_encode($tasks)}}', '{{json_encode($users)}}', '{{$group->id}}', '{{$rosters}}');return false;">{{$group->name}}</a>
                            <br>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="roster-container">
                <h2 id="group-name">{{$groups[0]['name']}}</h2>
                <hr>
                <div class="group-elements" id="group-lead">Lead: {{$users->find($groups[0]['user_ID'])->name}}</div>
                <div class="group-elements" id="group-description">Description: {{$groups[0]['description']}}</div>
                <div class="group-elements" id="group-budget">Budget: ${{$groups[0]['budget']}}.00</div>
                <hr>
                <h2 class="roster-headers">Actions</h2>
                <hr>
                <div id="group-actions">
                    @foreach ($actions as $action)
                        @if ($action->group == $groups[0]['id'])
                            <div class="action-task-content">
                                <a class="action-task-content-link" href="{{url('/task', $action->id)}}">{{$action->description}}</a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                <h2 class="roster-headers">Tasks</h2>
                <hr>
                <div id="group-tasks">
                    @foreach ($tasks as $task)
                        @if ($task->group == $groups[0]['id'])
                            <div class="action-task-content">
                                <a class="action-task-content-link" href="{{url('/task', $task->id)}}">{{$task->description}}</a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                <h2 class="roster-headers">Roster</h2>
                <hr>
                <div id="group-users">
                    @foreach ($rosters as $roster)
                        @if ($roster->group_ID == $groups[0]['id'])
                            <div class="roster-names">{{$users->find($roster->user_ID)->name}}</div>

                        @endif
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <script type="text/javascript">
        function display(element, lead, description, budget, actions, tasks, users, id, rosters) {

            var $name = element.innerHTML;
            var headerText = document.getElementById("group-name");
            var descriptionText = document.getElementById("group-description");
            var leadText = document.getElementById("group-lead");
            var budgetText = document.getElementById("group-budget");
            var actionText = document.getElementById("group-actions");
            var taskText = document.getElementById("group-tasks");
            var userText = document.getElementById("group-users");
            var actionsArray = JSON.parse(actions);
            var tasksArray = JSON.parse(tasks);
            var usersArray = JSON.parse(users);
            var rostersArray = JSON.parse(rosters);
            var actionContent = '';
            var taskContent = '';
            var userContent = '';

            for (var i = 0; i < actionsArray.length; i++)
                if (actionsArray[i].group == id)
                    actionContent+="<div class='action-task-content'> <a class='action-task-content-link' href=\"action/" + actionsArray[i].id + "\">" + actionsArray[i].description + "</a> </div>";

            for (var i = 0; i < tasksArray.length; i++)
                if (tasksArray[i].group == id)
                    taskContent+="<div class='action-task-content'> <a class='action-task-content-link' href=\"task/" + tasksArray[i].id + "\">" + tasksArray[i].description + "</a> </div>";

            for (var j = 0; j < usersArray.length; j++)
                for (var k = 0; k < rostersArray.length; k++)
                    if ((usersArray[j].id == rostersArray[k].user_ID) && (rostersArray[k].group_ID == id))
                        userContent+="<div class='user-content'>" + usersArray[j].name + "</div>";

            userText.innerHTML = userContent;
            actionText.innerHTML = actionContent;
            taskText.innerHTML = taskContent;
            headerText.innerHTML = $name;
            descriptionText.innerHTML = "Description: " + description;
            budgetText.innerHTML = "Budget: $" + budget + ".00";
            leadText.innerHTML = "Lead: " + lead;
        }
    </script>
@stop