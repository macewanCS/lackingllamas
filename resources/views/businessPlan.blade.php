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

                <button onclick="getSelectedRowType()">Edit</button>
            </div>



        </div>

        <div class="tableDiv">
            <table id="grid-basic"  class="table table-condensed table-hover bootgrid-table">
                <thead>
                <tr>
                    <th data-column-id="id" data-formatter="colorizer" data-header-css-class="id" data-visible="false"></th>
                    <th data-column-id="ident" data-formatter="colorizer" data-header-css-class="indent" data-identifier="true" data-visible="false"></th>
                    <th data-column-id="type" data-formatter="colorizer" data-header-css-class="type" data-visible="false"></th>
                    <th data-column-id="status" data-formatter="colorizer" data-header-css-class="status"></th>
                    <th data-column-id="desc" data-formatter="colorizer" data-header-css-class="desc">Description</th>
                    <th data-column-id="date" data-formatter="colorizer" data-header-css-class="date">Due</th>
                    <th data-column-id="collabs" data-formatter="colorizer" data-header-css-class="collabs">Collaborators</th>
                    <th data-column-id="budget" data-formatter="colorizer" data-header-css-class="budget">Budget</th>
                    <th data-column-id="successM" data-formatter="colorizer" data-header-css-class="successM">Success</th>
                    <th data-column-id="user" data-formatter="colorizer" data-header-css-class="user">User</th>
                    <th data-column-id="group" data-formatter="colorizer" data-header-css-class="group">Group</th>
                </tr>
                </thead>
                <tbody>
                @foreach($goals as $goal)
                    <?php $test = true ?>
                    @foreach($objectives as $objective)
                        @if($objective->goal_id==$goal->id)
                            <?php $test = false ?>
                            <tr>
                                <td>{{$objective->id}}</td>
                                <td>{{$objective->ident}}</td>
                                <td>objective</td>
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
                                        <td>{{$action->id}}</td>
                                        <td>{{$action->ident}}</td>
                                        <td>action</td>
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
                                                <td>{{$task->id}}</td>
                                                <td>{{$task->ident}}</td>
                                                <td>task</td>
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
                    @if ($test)
                        <tr>
                            <td>{{$goal->id}}</td>
                            <td>{{$goal->ident . '.1'}}</td>
                            <td>goal</td>
                            <td>-1</td>
                            <td>{{$goal->name}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
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

    <script type="text/javascript">
        var rowIds = [];
        var selectedRow;
        var grid = $("#grid-basic").bootgrid(
                {
                    selection: true,
                    multiSelect: false,
                    rowSelect: true,
                    keepSelection: true,

                    formatters: {
                        colorizer: function (column, row) {
                            if (column.id == "status"){
                                var prog = row.status;
                                if (prog < 0){
                                    return "<div class=\"ico\"><span class=\"fa fa-fw\"></span></div>";
                                }
                                else if (prog == 0){
                                    return "<div class=\"ico\"></div>";
                                }
                                else if (prog == 1){
                                    return "<div class=\"ico\"><span class=\"fa fa-hourglass-1\"></span></div>";
                                }
                                else if (prog == 2){
                                    return "<div class=\"ico\"><span class=\"fa fa-check\"></span></div>";
                                }
                                else {
                                    return "<div class=\"ico\"><span class=\"fa fa-fw\"></span></div>";
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
        ).on("selected.rs.jquery.bootgrid", function(e, rows){
            var rowsIds = [];
            for (var i = 0; i < rows.length; i++)
            {
                rowIds.push(rows[i].id);
            }
        }).on("deslected.rs.jquery.bootgrid", function (e, rows){
            for (var i = 0; i < rows.length; i++)
            {
                rowIds.remove(rows[i].id);
            }
        }).on("click.rs.jquery.bootgrid", function(e, columns, row) {
            selectedRow = row;
        });

        function getSelectedRowType(){
            alert(selectedRow.type);
            window.location.assign("/businessplan/"+selectedRow.id+"/edit/"+selectedRow.type);
        }
    </script>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
@stop