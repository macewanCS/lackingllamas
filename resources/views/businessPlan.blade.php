@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/businessPlan.css') !!}
    {!! Html::style('css/font-awesome.css') !!}
    {!! Html::style('css/Template.css') !!}
    {!! Html::style('javascript/jquery-ui/jquery-ui.css') !!}
    {!! Html::style('css/jquery.multiselect.css') !!}
    {!! Html::style('css/jquery.multiselect.filter.css') !!}
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

            <div class="selector">
                <label>Shown Elements:</label>
                <select id="GOAT" name="GOAT" multiple="multiple">
                    <option value="1" selected="selected">Goals</option>
                    <option value="2" selected="selected">Objectives</option>
                    <option value="3" selected="selected">Actions</option>
                    <option value="4" selected="selected">Task</option>
                </select>
            </div>

        </div>

        <div class="tableDiv">
            <table id="grid-basic"  class="table table-condensed table-hover bootgrid-table">
                <thead>
                <tr>
                    <th data-column-id="id" data-formatter="colorizer" data-header-css-class="id" data-visible="false"></th>
                    <th data-column-id="ident" data-formatter="colorizer" data-header-css-class="indent" data-identifier="true" data-visible="false"></th>
                    <th data-column-id="type" data-formatter="colorizer" data-header-css-class="type" data-visible="false"></th>
                    <th data-column-id="progress" data-formatter="colorizer" data-header-css-class="progress"></th>
                    <th data-column-id="status" data-formatter="colorizer" data-header-css-class="status" data-visible="false"></th>
                    <th data-column-id="desc" data-formatter="colorizer" data-header-css-class="desc">Description</th>
                    <th data-column-id="date" data-formatter="colorizer" data-header-css-class="date">Due</th>
                    <th data-column-id="collabs" data-formatter="colorizer" data-header-css-class="collabs">Collaborators</th>
                    <th data-column-id="budget" data-formatter="budget" data-header-css-class="budget">Budget</th>
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
                                <td></td>
                                <td>1</td>
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
                                        <td>2</td>
                                        <td>{{$action->description}}</td>
                                        <td>{{$action->date}}</td>
                                        <td>{{$action->collaborators}}</td>
                                        <td>{{$action->budget}}</td>
                                        <td>{{$action->successMeasured}}</td>
                                        <td>{{$users[$action->userId - 1]->name}}</td>
                                        <td>{{$groups[$action->group - 1]->name}}</td>
                                    </tr>
                                    @foreach($tasks as $task)
                                        @if($task->action_id==$action->id)
                                            <tr>
                                                <td>{{$task->id}}</td>
                                                <td>{{$task->ident}}</td>
                                                <td>task</td>
                                                <td>{{$task->progress}}</td>
                                                <td>3</td>
                                                <td>{{$task->description}}</td>
                                                <td>{{$task->date}}</td>
                                                <td>{{$task->collaborators}}</td>
                                                <td>{{$task->budget}}</td>
                                                <td>{{$task->successMeasured}}</td>
                                                <td>{{$users[$task->userId - 1]->name}}</td>
                                                <td>{{$groups[$task->group - 1]->name}}</td>
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
                            <td>{{$goal->ident}}</td>
                            <td>goal</td>
                            <td></td>
                            <td>0</td>
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
    {!! Html::script('javascript/jquery-2.0.3.min.js') !!}
    {!! Html::script('javascript/jquery-ui/jquery-ui.js') !!}
    {!! Html::script('javascript/jquery.bootgrid.js') !!}
    {!! Html::script('javascript/jquery.bootgrid.fa.js') !!}
    {!! Html::script('javascript/jquery.multiselect.js') !!}
    {!! Html::script('javascript/jquery.multiselect.filter.js') !!}

    <script type="text/javascript">
        var rowIds = [];
        var selectedRow;
        var grid = $("#grid-basic").bootgrid(
                {
                    selection: true,
                    multiSelect: false,
                    rowSelect: true,
                    keepSelection: true,
                    columnSelection: false,
                    rowCount: -1,
                    caseSensitive: false,
                    statusMappings: {
                      0: "Goal",
                        1: "Objective",
                        2: "Action",
                        3: "Task"
                    },

                    formatters: {
                        colorizer: function (column, row) {
                            if (column.id == "progress"){
                                var prog = row.progress;
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
                            else {
                                return "<div>" + row[column.id] + "</div>";
                            }
                        },
                        budget: function (column, row) {
                            if (column.id = "budget"){
                                if (row[column.id] == "0"){
                                    return "<div class=\"hidden\">" + row[column.id] + "</div>";
                                }
                                else {
                                    return "<div>" + row[column.id] + "</div>";
                                }
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
            if (row == selectedRow) {
                selectedRow = null;
            }
            else {
                selectedRow = row;
            }
        });

        function getSelectedRowType(){
            if (selectedRow == null){
                alert('Please select a row first');
            }
            else {
                window.location.assign("/businessplan/" + selectedRow.id + "/edit/" + selectedRow.type);
            }
        }

        var goatSelector = $("#GOAT").multiselect({
            height: "auto",
            noneSelectedText: "Choose Element",
            selectedList: 0,
            header: false
        });
    </script>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
@stop