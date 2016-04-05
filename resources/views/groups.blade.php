@extends('layouts.app')
@section('endHead')
    {!! Html::style('css/groups.css') !!}
    {!! html::style('css/actionComments.css') !!}
@stop
@section('content')
    <div class="groups-container">
        <div class="groups-container-inner">
            <div class="options-container">
                <div id="search-results">
                    <ul class="result-list">
                    @if (count($groups))
                        <div id="select-group">Departments</div>
                        @foreach($groups as $group)<!--departments-->
                            @if(!$group->team)
                            <li class="result-list-elem team" href="#" onclick="display('{{$group->name}}','{{$users->find($group->user_ID)->name}}' ,'{{$group->description}}', '{{$group->budget}}', '{{$group->id}}')">
                                <a id="link-result">{{$group->name}}</a>
                            </li>
                            @endif
                        @endforeach
                        <div id="select-group">Teams</div>
                        @foreach($groups as $group)<!--teams-->
                            @if($group->team)
                            <li class="result-list-elem department" href="#" onclick="display('{{$group->name}}','{{$users->find($group->user_ID)->name}}' ,'{{$group->description}}', '{{$group->budget}}', '{{$group->id}}')">
                                <a id="link-result">{{$group->name}}</a>
                            </li>
                            @endif
                        @endforeach
                    @else
                        <li class="result-list-elem">N/A</li>
                    @endif
                    </ul>
                </div>
            </div>

            <div class="roster-container">
                @if (count($groups))
                <h2 id="group-name"><label id="group-name-colour-bar"></label>{{$groups[$bpid - 1]['name']}}</h2>
                @else
                <h2 id="group-name"><label id="group-name-colour-bar"></label>No Groups</h2>
                @endif
                @if (count($groups))
                <div class="group-elements" id="group-lead">Lead: {{$users->find($groups[$bpid - 1]['user_ID'])->name}}</div>
                <div class="group-elements" id="group-description">Description: {{$groups[$bpid - 1]['description']}}</div>
                <div class="group-elements" id="group-budget">Budget: ${{$groups[$bpid - 1]['budget']}}</div>
                @else
                <div class="group-elements" id="group-lead">Lead: N/A</div>
                <div class="group-elements" id="group-description">Description: N/A</div>
                <div class="group-elements" id="group-budget">Budget: N/A</div>
                @endif
                    <br>
                <h2 class="roster-headers"><label id="action-colour-bar"></label>Actions</h2>
                <div id="group-actions">
                    @if (count($groups))
                        @foreach ($actions[$bpid - 1] as $action)
                            @if ($action->group == $groups[$bpid - 1]['id'])
                                <div class="action-task-content">
                                    <a class="action-task-content-link" href="{{url('/action', $action->id)}}">{{$action->description}}</a>
                                </div>
                            @endif
                        @endforeach
                    @else
                    <div class="action-task-content">N/A</div>
                    @endif
                </div>
                    <br>
                <h2 class="roster-headers"><label id="task-colour-bar"></label>Tasks</h2>
                <div id="group-tasks">
                    @if (count($groups))
                        @foreach ($tasks[$bpid - 1] as $task)
                            @if ($task->group == $groups[$bpid - 1]['id'])
                                <div class="action-task-content">
                                    <a class="action-task-content-link" href="{{url('/task', $task->id)}}">{{$task->description}}</a>
                                </div>
                            @endif
                        @endforeach
                    @else
                    <div class="action-task-content">N/A</div>
                    @endif
                </div>
                    <br>

            </div>
            <div id="Rosters">
                <h2 class="roster-headers"><label id="roster-colour-bar"></label>Roster</h2>
                <div id="group-users">
                    @if (count($groups))
                        @foreach ($rosters as $roster)
                            @if ($roster->group_ID == $groups[$bpid - 1]['id'])
                                <div class="roster-names">
                                    <a id="roster-link" href="{{url('/businessplan/' . $bpid . '/user/' . $users->find($roster->user_ID)->id)}}">{{$users->find($roster->user_ID)->name}}</a>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="roster-names">N/A</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        function display(element, lead, description, budget, id) {

            var $name = element;
            var headerText = document.getElementById("group-name");
            var descriptionText = document.getElementById("group-description");
            var leadText = document.getElementById("group-lead");
            var budgetText = document.getElementById("group-budget");
            var actionText = document.getElementById("group-actions");
            var taskText = document.getElementById("group-tasks");
            var userText = document.getElementById("group-users");
            var actionsArray = $.parseJSON('{{json_encode($actions[$bpid-1], JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)}}'.replace(/&quot;/g, '\u0022'));
            var tasksArray = $.parseJSON('{{json_encode($tasks[$bpid-1], JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)}}'.replace(/&quot;/g, '\u0022'));
            var usersArray = $.parseJSON('{{json_encode($users, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)}}'.replace(/&quot;/g, '\u0022'));
            var rostersArray = $.parseJSON('{{json_encode($rosters, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)}}'.replace(/&quot;/g, '\u0022'));
            var groupsArray = $.parseJSON('{{json_encode($groups, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)}}'.replace(/&quot;/g, '\u0022'));
            var actionContent = '';
            var taskContent = '';
            var userContent = '';

            for (var i = 0; i < actionsArray.length; i++)
                if (actionsArray[i].group == id)
                    actionContent+="<div class='action-task-content'> <a class='action-task-content-link' href=\"action/" + actionsArray[i].id + "\">" + actionsArray[i].description + "</a> </div>";

            for (var i = 0; i < tasksArray.length; i++)
                if (tasksArray[i].group == id)
                    taskContent+="<div class='action-task-content'> <a class='action-task-content-link' href=\"task/" + tasksArray[i].id + "\">" + tasksArray[i].description + "</a> </div>";
            userContent += "<div class=\"roster-names\">";
            for (var j = 0; j < usersArray.length; j++)
                for (var k = 0; k < rostersArray.length; k++)
                    if ((usersArray[j].id == rostersArray[k].user_ID) && (rostersArray[k].group_ID == id))
                        userContent += "<a id=\"rosters-link\" href=\"/businessplan/" + {{$bpid}} + "/user/" + j + "\">" + usersArray[j].name + "</a>";
            userContent += "</div>";

            userText.innerHTML = userContent;
            actionText.innerHTML = actionContent;
            taskText.innerHTML = taskContent + "<br>";
            headerText.innerHTML = "<label id=\"group-name-colour-bar\"></label>" + $name;
            descriptionText.innerHTML = "Description: " + description;
            budgetText.innerHTML = "Budget: $" + budget + "<br>";
            leadText.innerHTML = "Lead: " + lead;
            userText.innerHTML = userContent;
        }
    </script>
@stop