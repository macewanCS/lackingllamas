@extends('layouts.app')

@section('endHead')
    {!! Html::style('css/businessPlan.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/template.min.css') !!}
    {!! Html::style('javascript/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('css/jquery.multiselect.css') !!}
    {!! Html::style('css/jquery.multiselect.filter.css') !!}
@stop





@section('content')

    <div id="mainDiv">
    
            <h1>
                  
                 {{ $nameBP}}
            </h1>
           <a href="{{ URL::to('imprimer') }}">
  <button>PDF</button>
</a>
    <hr>
        <div class="pageLoad"><img src="/pictures/page-loader.gif"/></div>
        <div class="sideDiv" id="sideDiv">
            <div class="dropDown">
                <button onclick="myFunction()" class="dropbtn">Create</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="/businessplan/{{$idbp}}/creategoal">Create Goal</a>
                    <a href="/businessplan/{{$idbp}}/createobjective">Create Objective</a>
                    <a href="/businessplan/{{$idbp}}/createaction">Create Action</a>
                    <a href="/businessplan/{{$idbp}}/createtask">Create Task</a>
                </div>

            </div>

            <div class="filtering">
                <label>Filter By:</label>
            </div>
            <div class="bpSelector">
                <label>Business Plan: </label>
                <select id="bpSelect" name="bpSelect" multiple="multiple">
                @for($i=0;$i<$idbp;$i++)
                    <option value=1 selected="selected">{{$i}}</option>
                @endfor
                </select>
            </div>
            <div class="goatSelector">
                <label>Type: </label>
                <select id="GOAT" name="GOAT" multiple="multiple">
                    <option value="Goal" selected="selected">Goals</option>
                    <option value="Objective" selected="selected">Objectives</option>
                    <option value="Action" selected="selected">Actions</option>
                    <option value="Task" selected="selected">Tasks</option>
                </select>
            </div>

            <div class="collabSelector">
                <label>Collaborators: </label>
                <select id="collab" name="collab" multiple="multiple">
                    <optgroup label="Users">
                        @foreach($users as $user)
                            <option value="{{$user->name}}" selected="selected">{{$user->name}}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Groups">
                        @foreach($groups as $group)
                            <option value="{{$group->name}}" selected="selected">{{$group->name}}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

            <div class="leadSelector">
                <label>Leads: </label>
                <select id="lead" name="lead" multiple="multiple">
                    @foreach($users as $user)
                        <option value="{{$user->name}}" selected="selected">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="groupSelector">
                <label>Groups: </label>
                <select id="group" name="group" multiple="multiple">
                    @foreach($groups as $group)
                        <option value="{{$group->name}}" selected="selected">{{$group->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="datePicker">
                <label class="dateTitle">Due Date: </label>
                <label class="dateLabel">From: </label>
                <input title="From: " type="text" id="datePicker" class="picker">
                <label class="dateLabel">To: </label>
                <input title="To: " type="text" id="datePicker2" class="picker">
            </div>

            <div class="budgetBox">
                <label class="budgetTitle">Budget: </label>
                <label class="budgetLabel">Greater Than: </label>
                <textarea class="ta" id="budgetFrom" cols="10" rows="1"></textarea>
                <label class="budgetLabel">Less Than: </label>
                <textarea class="ta" id="budgetTo" cols="10" rows="1"></textarea>

            </div>

            <div class="checkBoxes">
                <label class="checkBoxesTitle">Show: </label>
                <div class="checkLabels">
                    <label id="checkFirst">BP</label>
                    <label id="checkSecond">NonBP</label>
                </div>
                <div class="check">
                    <input type="checkbox" id="check1" name="check1" />
                </div>

                <div class="check">
                    <input type="checkbox" id="check2" name="check2" />
                </div>
            </div>

            <div class="Clear">
                <button id="resetButton" onclick="clearFilters()">Reset Filtering</button>
            </div>

        </div>

        <div class="tableDiv" id="tableDiv">
            <table id="grid-basic"  class="table table-condensed table-hover bootgrid-table">
                <thead>
                <tr>
                    <th data-column-id="id" data-formatter="colorizer" data-header-css-class="id" data-visible="false"></th>
                    <th data-column-id="ident" data-formatter="colorizer" data-header-css-class="indent" data-identifier="true" data-visible="false"></th>
                    <th data-column-id="secondaryIdent" data-formatter="colorizer" data-header-css-class="secondaryIdent" data-visible="false"></th>
                    <th data-column-id="type" data-formatter="colorizer" data-header-css-class="type" data-visible="false"></th>
                    <th data-column-id="status" data-formatter="colorizer" data-header-css-class="status" data-visible="false"></th>
                    <th data-column-id="desc" data-formatter="colorizer" data-header-css-class="desc">Description</th>
                    <th data-column-id="user" data-formatter="colorizer" data-header-css-class="user">Lead</th>
                    <th data-column-id="group" data-formatter="colorizer" data-header-css-class="group">Group</th>
                    <th data-column-id="collabs" data-formatter="colorizer" data-header-css-class="collabs">Collaborators</th>
                    <th data-column-id="budget" data-formatter="colorizer" data-header-css-class="budget">Budget</th>
                    <th data-column-id="successM" data-formatter="colorizer" data-header-css-class="successM">Success</th>
                    <th data-column-id="date" data-formatter="colorizer" data-header-css-class="date">Due</th>
                    <th data-column-id="progress" data-formatter="colorizer" data-header-css-class="progress" data-sortable="false">Prog.</th>
                    <th data-column-id="commands" data-formatter="commands" data-header-css-class="commands" data-sortable="false" data-align="right">Utilities</th>
                </tr>
                </thead>
                <tbody>
     @foreach($bpPlans as $bp)
        @if(substr_count($bp->ident, ".")==0)
        @if($temp = $bp)
        @endif
        <tr>
            <td>{{$bp->id}}</td>
            <td>{{$bp->ident}}</td>
            <td>{{$temp->name}}.{{$bp->ident}}</td>
            <td>Goal</td>
            <td>1</td>
            <td>{{$bp->name}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endif
         @if(substr_count($bp->ident, ".")==1)
            <tr>
                <td>{{$bp->id}}</td>
                <td>{{$bp->ident}}</td>
                <td>{{$temp->name}}.{{$bp->ident}}</td>
                <td>Objective</td>
                <td>1</td>
                <td>{{$temp->name}}</td>
                <td>--</td>
                <td>--</td>
                <td>{{$bp->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endif 
          @if(substr_count($bp->ident, ".")==2)
            <tr>
                <td>{{$bp->id}}</td>
                <td>{{$bp->ident}}</td>
                <td>{{$temp->name}}.{{$bp->ident}}</td>
                <td>Action</td>
                <td>2</td>
                <td>{{$bp->description}}</td>
                <td>{{$users[$bp->userId - 1]->name}}</td>
                <td>{{$groups[$bp->group - 1]->name}}</td>
                <td>{{$bp->collaborators}}</td>
                <td>{{$bp->budget}}</td>
                <td>{{$bp->successMeasured}}</td>
                <td>{{$bp->date}}</td>
                <td>{{$bp->progress}}</td>
            </tr>         
        @endif
        @if(substr_count($bp->ident, ".")==3)
        <tr>
            <td>{{$bp->id}}</td>
            <td>{{$bp->ident}}</td>
            <td>{{$temp->name}}.{{$bp->ident}}</td>
            <td>Task</td>
            <td>3</td>
            <td>{{$bp->description}}</td>
            <td>{{$users[$bp->userId - 1]->name}}</td>
            <td>{{$groups[$bp->group - 1]->name}}</td>
            <td>{{$bp->collaborators}}</td>
            <td>{{$bp->budget}}</td>
            <td>{{$bp->successMeasured}}</td>
            <td>{{$bp->date}}</td>
            <td>{{$bp->progress}}</td>
        </tr>         
        @endif
    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    {!! Html::script('javascript/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('javascript/jquery.bootgrid.js') !!}
    {!! Html::script('javascript/jquery.bootgrid.fa.js') !!}
    {!! Html::script('javascript/jquery.multiselect.min.js') !!}
    {!! Html::script('javascript/jquery.multiselect.filter.min.js') !!}

    <script type="text/javascript">
        // CSRF protection
        $.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });

        var maxGoals;
        var maxObj;
        var maxActions;
        var maxTasks;
        var date1;
        var date2;
        var grid = $("#grid-basic").bootgrid(
                {
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
                            else if (column.id == "desc") {
                                return "<div class=\"descript\">" + row[column.id] + "</div>";
                            }
                            else if ((row[column.id] == ""  || row[column.id] == "0") && (row["type"] == "Action" || row["type"] == "Task")){
                                return "<div class=\"center\">" + "-" + "</div>";
                            }
                            else {
                                return "<div>" + row[column.id] + "</div>";
                            }
                        },
                        "commands": function(column, row) {
                            if (row["type"] == "Action" || row["type"] == "Task") {
                                return "<div class=\"commandButtons\"><button type=\"button\" class=\"btn btn-xs btn-default command-note\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-sticky-note-o\"></span></button> " +
                                        "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-pencil\"></span></button> " +
                                        "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-trash-o\"></span></button></div>";
                            }
                            else {
                                return  "<div class=\"commandButtons\"><button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-pencil\"></span></button> " +
                                        "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-trash-o\"></span></button></div>";
                            }
                        }
                    }
                }
        ).on("loaded.rs.jquery.bootgrid", function()
        {
            /* Executes after data is loaded and rendered */
            grid.find(".command-edit").on("click", function(e)
            {
                var row = grid.bootgrid("getRowData", $(this).data("row-id"));
                window.location.assign("/businessplan/{{$idbp}}/"+ row.type +"/"+ row.id + "/edit");


            }).end().find(".command-delete").on("click", function(e)
            {
                var row = grid.bootgrid("getRowData", $(this).data("row-id"));
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: "/businessplan/{{$idbp}}/" + row.type + "/" + row.id +"/delete",
                    data: {_token:token}
                });
                grid.bootgrid("remove", [$(this).data("row-id")]);
                cascadeDeletes(row.ident);
            }).end().find(".command-note").on("click", function(e)
            {
                var row = grid.bootgrid("getRowData", $(this).data("row-id"));
                window.location.assign("/" + row.type.toLowerCase() + "/" + row.id);
            });
        });
        var bpSelector = $("#bpSelect").multiselect({
            height: "auto",
            noneSelectedText: "Choose Element",
            selectedList: 0,
            header: "Choose element(s)",
            click: function (event, ui) {
                if (ui.checked){
                    grid.bootgrid("addParams", ui.value, 2);
                }
                else {
                    grid.bootgrid("removeParams", ui.value, 2);
                }
            }
        });

        function cascadeDeletes (ident) {
            ident = String(ident);
            var depth = 3 - (ident.split(".").length - 1);
            var i = 1, j = 1, k = 1;
            while(i < maxObj){
                if (grid.bootgrid("getRowData", ident + "." + i) == null){
                    i++;
                    j = 1;
                    continue;
                }
                grid.bootgrid("remove", [ident + "." + i]);
                while(j < maxActions) {
                    if (grid.bootgrid("getRowData", ident + "." + i + "." + j) == null){
                        j++;
                        k = 1;
                        continue;
                    }
                    grid.bootgrid("remove", [ident + "." + i + "." + j]);
                    while(k < maxTasks) {
                        if (grid.bootgrid("getRowData", ident + "." + i + "." + j + "." + k) == null) {
                            k++;
                            continue;
                        }
                        grid.bootgrid("remove", [ident + "." + i + "." + j + "." + k]);
                        k++;
                    }
                    j++;
                    k = 1;
                }
                i++;
                j = 1;
            }
        }

        var goatSelector = $("#GOAT").multiselect({
            height: "auto",
            noneSelectedText: "Choose Element",
            selectedList: 0,
            header: "Choose element(s)",
            click: function (event, ui) {
                if (ui.checked){
                    grid.bootgrid("addParams", ui.value, 3);
                }
                else {
                    grid.bootgrid("removeParams", ui.value, 3);
                }
            },
            checkAll: function () {
                grid.bootgrid("addParams", "Goal", 3);
                grid.bootgrid("addParams", "Objective", 3);
                grid.bootgrid("addParams", "Action", 3);
                grid.bootgrid("addParams", "Task", 3);
            },
            uncheckAll: function () {
                grid.bootgrid("removeParams", undefined, 3);
            }
        });

        var collabMaxCount;
        var collabSelector = $("#collab").multiselect({
            selectedList: 0,
            header: true,
            minWidth: "auto",
            position: {
                my: 'right top',
                at: 'right bottom'
            },
            click: function (event, ui) {
                if (ui.checked){
                    grid.bootgrid("addParams", ui.value, 8);
                    if (collabSelector.multiselect("getChecked").length == collabMaxCount){
                        grid.bootgrid("addParams", "", 8);
                    }
                }
                else {
                    grid.bootgrid("removeParams", "", 8);
                    grid.bootgrid("removeParams", ui.value, 8);
                }
            },
            checkAll: function () {
                    @foreach($users as $user)
                        grid.bootgrid("addParams", "{{$user->name}}", 8);
                    @endforeach
                    @foreach($groups as $group)
                        grid.bootgrid("addParams", "{{$group->name}}", 8);
                    @endforeach
                        grid.bootgrid("addParams", "", 8);
            },
            uncheckAll: function () {
                    grid.bootgrid("removeParams", undefined, 8);
            },
            optgrouptoggle: function (event, ui) {
                var values = $.map(ui.inputs, function (checkbox){
                    return checkbox.value;
                });
                if (ui.checked) {
                    for (var value in values) {
                        if ((typeof values[value]) == "string") {
                            grid.bootgrid("addParams", values[value], 8);
                        }
                    }
                    if (collabSelector.multiselect("getChecked").length == collabMaxCount) {
                        grid.bootgrid("addParams", "", 8);
                    }
                }
                else {
                    if (collabSelector.multiselect("getChecked").length == 0) {
                        grid.bootgrid("removeParams", undefined, 8);
                    }
                    else {
                        for (var value in values) {
                            if ((typeof values[value]) == "string") {
                                grid.bootgrid("removeParams", values[value], 8);
                            }
                        }
                    }
                }
            }
        }).multiselectfilter();

        var leadMaxCount;
        var leadSelector = $("#lead").multiselect({
            selectedList: 0,
            header: true,
            minWidth: "auto",
            position: {
                my: 'right top',
                at: 'right bottom'
            },
            click: function (event, ui) {
                if (ui.checked) {
                    grid.bootgrid("addParams", ui.value, 6);
                    if (leadSelector.multiselect("getChecked").length == leadMaxCount){
                        grid.bootgrid("addParams", "", 6);
                    }
                }
                else {
                    grid.bootgrid("removeParams", "", 6);
                    grid.bootgrid("removeParams", ui.value, 6);
                }
            },
            checkAll: function () {
                @foreach($users as $user)
                    grid.bootgrid("addParams", "{{$user->name}}", 6);
                @endforeach
                grid.bootgrid("addParams", "", 6);
            },
            uncheckAll: function () {
                grid.bootgrid("removeParams", undefined, 6);
            }
        }).multiselectfilter();

        var groupMaxCount;
        var groupSelector = $("#group").multiselect({
            selectedList: 0,
            header: true,
            minWidth: "auto",
            position: {
                my: 'right top',
                at: 'right bottom'
            },
            click: function (event, ui) {
                if (ui.checked) {
                    grid.bootgrid("addParams", ui.value, 7);
                    if (groupSelector.multiselect("getChecked").length == groupMaxCount){
                        grid.bootgrid("addParams", "", 7);
                    }
                }
                else {
                    grid.bootgrid("removeParams", "", 7);
                    grid.bootgrid("removeParams", ui.value, 7);
                }
            },
            checkAll: function () {
                @foreach($groups as $group)
                    grid.bootgrid("addParams", "{{$group->name}}", 7);
                @endforeach
                grid.bootgrid("addParams", "", 7);
            },
            uncheckAll: function () {
                grid.bootgrid("removeParams", undefined, 7);

            }
        }).multiselectfilter();


        function setupDate1 () {
            date1 = $("#datePicker").datepicker({
                dateFormat: "yy-mm-dd",
                showButtonPanel: true,
                onClose: function (dateText, inst) {
                    if (dateText != "") {
                        grid.bootgrid("removeParams", undefined, 11);
                        grid.bootgrid("addConstraint", undefined, 11);
                        grid.bootgrid("addParams", dateText, 11);
                        grid.bootgrid("addConstraint", "greater", 11);
                        if (document.getElementById("datePicker2").value != "") {
                            grid.bootgrid("addParams", document.getElementById("datePicker2").value, 11);
                            grid.bootgrid("addConstraint", "lesser", 11);
                        }
                    }
                    else {
                        grid.bootgrid("removeParams", undefined, 11);
                        grid.bootgrid("addConstraint", undefined, 11);
                        if (document.getElementById("datePicker2").value != "") {
                            grid.bootgrid("addParams", document.getElementById("datePicker2").value, 11);
                            grid.bootgrid("addConstraint", "lesser", 11);
                        }
                    }
                }
            });
        }

        function setupDate2 () {
            date2 = $("#datePicker2").datepicker({
                dateFormat: "yy-mm-dd",
                showButtonPanel: true,
                onClose: function (dateText, inst) {
                    if (dateText != "") {
                        grid.bootgrid("removeParams", undefined, 11);
                        grid.bootgrid("addConstraint", undefined, 11);
                        grid.bootgrid("addParams", dateText, 11);
                        grid.bootgrid("addConstraint", "lesser", 11);
                        if (document.getElementById("datePicker").value != "") {
                            grid.bootgrid("addParams", document.getElementById("datePicker").value, 11);
                            grid.bootgrid("addConstraint", "greater", 11);
                        }
                    }
                    else {
                        grid.bootgrid("removeParams", undefined, 11);
                        grid.bootgrid("addConstraint", undefined, 11);
                        if (document.getElementById("datePicker").value != "") {
                            grid.bootgrid("addParams", document.getElementById("datePicker").value, 11);
                            grid.bootgrid("addConstraint", "greater", 11);
                        }
                    }
                }
            });
        }
        var oldFromText = "";
        var budgetFrom = $("#budgetFrom").on("change keyup paste", function (){
            var currentFromText = $(this).val();
            if (currentFromText == oldFromText){
                    return;
            }
            else {
                    oldFromText = currentFromText;
                    if (currentFromText != ""){
                        grid.bootgrid("removeParams", undefined, 9);
                        grid.bootgrid("addConstraint", undefined, 9);
                        grid.bootgrid("addParams", currentFromText, 9);
                        grid.bootgrid("addConstraint", "greater", 9);
                        if (budgetTo.val() != ""){
                            grid.bootgrid("addParams", budgetTo.val(), 9);
                            grid.bootgrid("addConstraint", "lesser", 9);
                        }
                    }
                    else {
                        grid.bootgrid("removeParams", undefined, 9);
                        grid.bootgrid("addConstraint", undefined, 9);
                        if (budgetTo.val() != ""){
                            grid.bootgrid("addParams", budgetTo.val(), 9);
                            grid.bootgrid("addConstraint", "lesser", 9);
                        }
                    }
            }
        });

        var oldToText = "";
        var budgetTo = $("#budgetTo").on("change keyup paste", function (){
            var currentToText = $(this).val();
            if (currentToText == oldToText){
                return;
            }
            else {
                oldToText = currentToText;
                if (currentToText != ""){
                    grid.bootgrid("removeParams", undefined, 9);
                    grid.bootgrid("addConstraint", undefined, 9);
                    grid.bootgrid("addParams", currentToText, 9);
                    grid.bootgrid("addConstraint", "lesser", 9);
                    if (budgetFrom.val() != ""){
                        grid.bootgrid("addParams", budgetFrom.val(), 9);
                        grid.bootgrid("addConstraint", "greater", 9);
                    }
                }
                else {
                    grid.bootgrid("removeParams", undefined, 9);
                    grid.bootgrid("addConstraint", undefined, 9);
                    if (budgetFrom.val() != ""){
                        grid.bootgrid("addParams", budgetFrom.val(), 9);
                        grid.bootgrid("addConstraint", "greater", 9);
                    }
                }
            }
        });

        function sortAlpha () {
            grid.bootgrid("sortRows", function (a, b){
                if (a.secondaryIdent >= b.secondaryIdent) {
                    return 1;
                }
                else {
                    return -1;
                }
            });
        }

        function clearFilters () {
            grid.bootgrid("clearParams");
            goatSelector.multiselect("uncheckAll");
            collabSelector.multiselect("uncheckAll");
            leadSelector.multiselect("uncheckAll");
            groupSelector.multiselect("uncheckAll");
            date1.datepicker("destroy");
            date2.datepicker("destroy");
            document.getElementById("datePicker").value = "";
            document.getElementById("datePicker2").value = "";
            setupDate1();
            setupDate2();
            document.getElementById("budgetFrom").value = "";
            document.getElementById("budgetTo").value = "";
            grid.bootgrid("sort");
            sortAlpha();
        }

        function setFilters () {
            clearFilters();
            @if($filters["type"] != null)
                @if ($filters["type"] == "all")
                    goatSelector.multiselect("checkAll");
                @elseif ($filters["type"] == "none")
                    goatSelector.multiselect("uncheckAll");
                @else
                    goatSelector.multiselect("checkAll");
                    var types = goatSelector.multiselect("getChecked");
                    types = Array(types.slice(0,4))["0"];
                    goatSelector.multiselect("uncheckAll");
                    @foreach($filters["type"] as $type)
                        for(var i = 0; i < 4; i++) {
                            if (types[String(i)].value == "{{$type}}") {
                                goatSelector.multiselect("widget").find(":checkbox:eq(" + i + ")").click();
                            }
                        }
                    @endforeach
                @endif
            @endif

            @if($filters["collabs"] != null)
                @if ($filters["collabs"] == "all")
                    collabSelector.multiselect("checkAll");
                @elseif($filters["collabs"] == "none")
                    collabSelector.multiselect("uncheckAll");
                @else
                    collabSelector.multiselect("checkAll");
                    var collabs = collabSelector.multiselect("getChecked");
                    collabSelector.multiselect("uncheckAll");
                    @foreach($filters["collabs"] as $collab)
                        for(var j = 0; j < collabMaxCount - 1; j++) {
                            if (collabs[String(j)].value == "{{$collab}}") {
                                collabSelector.multiselect("widget").find(":checkbox:eq(" + j + ")").click();
                            }
                         }
                    @endforeach
                @endif
            @endif
            
            @if($filters["leads"] != null)
                @if ($filters["leads"] == "all")
                    leadSelector.multiselect("checkAll");
                @elseif($filters["leads"] == "none")
                    leadSelector.multiselect("uncheckAll");
                @else
                    leadSelector.multiselect("checkAll");
                    var leads = leadSelector.multiselect("getChecked");
                    leadSelector.multiselect("uncheckAll");
                    @foreach($filters["leads"] as $lead)
                        for(var k = 0; k < leadMaxCount - 1; k++) {
                            if (leads[String(k)].value == "{{$lead}}") {
                                leadSelector.multiselect("widget").find(":checkbox:eq(" + k + ")").click();
                            }
                        }
                    @endforeach
                @endif
            @endif

            @if($filters["groups"] != null)
                @if ($filters["groups"] == "all")
                    groupSelector.multiselect("checkAll");
                @elseif($filters["groups"] == "none")
                    groupSelector.multiselect("uncheckAll");
                @else
                    groupSelector.multiselect("checkAll");
                    var groups = groupSelector.multiselect("getChecked");
                    groupSelector.multiselect("uncheckAll");
                    @foreach($filters["groups"] as $lead)
                        for(var l = 0; l < leadMaxCount - 1; l++) {
                            if (groups[String(l)].value == "{{$lead}}") {
                                groupSelector.multiselect("widget").find(":checkbox:eq(" + l + ")").click();
                            }
                        }
                    @endforeach
                @endif
            @endif
        }


        $(document).ready(function () {
            sortAlpha();
            goatSelector.multiselect("uncheckAll");
            collabMaxCount = collabSelector.multiselect("getChecked").length;
            collabSelector.multiselect("uncheckAll");
            leadMaxCount = leadSelector.multiselect("getChecked").length;
            leadSelector.multiselect("uncheckAll");
            groupMaxCount = groupSelector.multiselect("getChecked").length;
            groupSelector.multiselect("uncheckAll");
            setupDate1();
            setupDate2();
            var rowCount = grid.bootgrid("getTotalRowCount");
            maxGoals = Math.ceil(rowCount * 0.15);
            maxObj = Math.ceil(rowCount * 0.35);
            maxActions = Math.ceil(rowCount * 0.65);
            maxTasks = Math.ceil(rowCount * 0.75);
            @if($filters != null)
                setFilters();
            @endif
            setTimeout(function() {
                document.getElementById("tableDiv").style.visibility = 'visible';
                document.getElementById("sideDiv").style.visibility = 'visible';
                $(".pageLoad").fadeOut(1500);
            }, 3000);
        });
    </script>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
@stop