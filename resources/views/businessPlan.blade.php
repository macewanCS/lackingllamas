@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/businessPlan.css') !!}
    {!! Html::style('http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') !!}
    {!!Html::style('http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css') !!}
    {!! Html::style('css/Template.css') !!}
@stop





@section('content')
    <div id="mainDiv">

        <div class="sideDiv">
            <div class="dropDown">
                <button onclick="myFunction()" class="dropbtn">Create</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="/businessplan/creategoal">Create Goal</a>
                    <a href="/businessplan/createobjective">Create Objective</a>
                    <a href="/businessplan/createaction">Create Action</a>
                    <a href="/businessplan/createtask">Create Task</a>
                </div>
            </div>
        </div>

        <div class="tableDiv">
            <table id="grid-basic"  class="table table-condensed table-hover bootgrid-table">
                <thead>
                <tr>
                    <th data-column-id="status" data-formatter="colorizer" data-header-css-class="status">Prog</th>
                    <th data-column-id="desc" data-formatter="colorizer" data-header-css-class="desc">Description of GOAT Element</th>
                    <th data-column-id="date" data-formatter="colorizer" data-header-css-class="date">Date</th>
                    <th data-column-id="collabs" data-formatter="colorizer" data-header-css-class="collabs">Collaborators</th>
                    <th data-column-id="budget" data-formatter="colorizer" data-header-css-class="budget">Budget</th>
                    <th data-column-id="successM" data-formatter="colorizer" data-header-css-class="successM">Success Measures</th>
                    <th data-column-id="user" data-formatter="colorizer" data-header-css-class="user">User</th>
                    <th data-column-id="group" data-formatter="colorizer" data-header-css-class="group">Group</th>
                </tr>
                </thead>
                <tbody>
                @foreach($goals as $goal)
                    @foreach($objectives as $objective)
                        @if($objective->goal_id==$goal->id)
                            <tr>
                                <td>-1</td>
                                <td>{{$goal->name}}</td>
                                <td></td>
                                <td>{{$objective->name}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($actions as $action)
                                @if($action->objective_id==$objective->id)
                                    <tr>
                                        <td>{{$action->progress}}</td>
                                        <td>{{$action->description}}</td>
                                        <td>{{$action->date}}</td>
                                        <td>{{$action->collaborators}}</td>
                                        <td>{{$action->budget}}</td>
                                        <td>{{$action->successMeasured}}</td>
                                        <td>{{$action->userId}}</td>
                                        <td>{{$action->teamOrDeptId}}</td>
                                    </tr>
                                    @foreach($tasks as $task)
                                        @if($task->action_id==$action->id)
                                            <tr>
                                                <td>{{$task->progress}}</td>
                                                <td>{{$task->description}}</td>
                                                <td>{{$task->date}}</td>
                                                <td>{{$task->collaborators}}</td>
                                                <td>{{$task->budget}}</td>
                                                <td>{{$task->successMeasured}}</td>
                                                <td>{{$task->userId}}</td>
                                                <td>{{$task->teamOrDeptId}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    {!! Html::script('javascript/jquery.bootgrid.js') !!}
    {!! Html::script('javascript/jquery.bootgrid.fa.js') !!}

    <script>
        $("#grid-basic").bootgrid(
                {
                    formatters: {
                        colorizer: function (column, row) {
                            if (column.id == "status"){
                                var prog = row.status;
                                if (prog < 0){
                                    return "";
                                }
                                else if (prog == 0){
                                    return "<div class=\"ico\"><span class=\"fa fa-minus-circle\"></span></div>";
                                }
                                else if (prog == 1){
                                    return "<div class=\"ico\"><span class=\"fa fa-hourglass-1\"></span></div>";
                                }
                                else if (prog == 2){
                                    return "<div class=\"ico\"><span class=\"fa fa-check\"></span></div>";
                                }
                                else {
                                    return "";
                                }
                            }
                            if (row.progress < 0){
                                if (column.id == "desc"){
                                    return "<div class=\"black go\">" + row[column.id] + "</div>";
                                }
                                else if (column.id == "collabs") {
                                    return "<div class=\"blue go\">" + row[column.id] + "</div>";
                                }
                                else {
                                    return "<div class=\"go\">" + row[column.id] + "</div>";
                                }
                            }
                            else {
                                return row[column.id];
                            }
                        }
                    }
                }
        );
    </script>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
@stop