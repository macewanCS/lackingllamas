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
        <div id ="headerBP">
        <h1>
            {{ $nameBP}}
        </h1>

                    @if ($permission > 2)
                    <a class="editBP" href="{{ url('/businessplan',$idbp) }}/edit">
                        {{ HTML::image('pictures/pen.png', 'picture', ['class'=>'edit-image']) }}
                    </a>
                    @endif

            <div class="exporting">
                <div class="exportMenu dropDown" style="position:relative">
                    <button class="exportMenuDropdown btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Export
                        <span class="caret"></span>
                    </button>

                    <ul class="exportMenu dropdown-menu">
                        <li value="1" selected="selected" onClick ="$('#grid-basic').tableExport({type:'json',escape:'false',tableName:'{{$nameBP}}',ignoreColumn:[8,9]});">JSON</li>
                        <li value="1" selected="selected" onClick ="$('#grid-basic').tableExport({type:'xml',escape:'true',tableName:'{{$nameBP}}',ignoreColumn:[8,9]});">XML</li>
                        <li value="1" selected="selected" onClick ="$('#grid-basic').tableExport({type:'csv',escape:'false',tableName:'{{$nameBP}}',ignoreColumn:[8,9]});">CSV</li>
                        <li value="1" selected="selected" onClick ="$('#grid-basic').tableExport({type:'txt',escape:'false',tableName:'{{$nameBP}}',ignoreColumn:[8,9]});">TXT</li>
                        <li value="1" selected="selected" onClick ="$('#grid-basic').tableExport({type:'sql',escape:'false',tableName:'{{$nameBP}}',ignoreColumn:[8,9]});">SQL</li>
                        <li value="1" selected="selected" onClick ="$('#grid-basic').tableExport({type:'excel',escape:'false',tableName:'{{$nameBP}}',ignoreColumn:[8,9]});">MS-Excel</li>
                        <li value="1" selected="selected" onClick ="generateReportPDF()">PDF</li>
                    </ul>
                </div>
            </div>

         <div style = "position:relative;visibility:hidden;left:0px;" class="dropdown" id="bp-selector-button">
          <button  class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">BP Selector
          <span class="caret"></span></button>
          <ul style ="left:-80px;"class="dropdown-menu">
            @foreach($bp as $plan)
                <li value=1 selected="selected"><a href="/businessplan/{{$plan->id}}">{{$plan->name}}</a></li>
            @endforeach
          </ul>
          </div>
    </div>
        <hr>
            <div class="pageLoad"><img src="/pictures/page-loader.gif"/></div>
            <div class="sideDiv" id="sideDiv">

                @if($permission > 1)
                <div style = "position:relative;"class="dropDown">
                    <button style ="width:120%;"  class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Create
                    <span class="caret"></span></button>

                    <ul style ="left:-20px;"class="dropdown-menu">
                        <li value=1 selected="selected"><a href="/businessplan/{{$idbp}}/createbp">Create Business Plan</a></li>
                        <li value=1 selected="selected"><a href="/businessplan/{{$idbp}}/creategoal">Create Goal</a></li>
                        <li value=1 selected="selected"><a href="/businessplan/{{$idbp}}/createobjective">Create Objective</a></li>
                        <li value=1 selected="selected"><a href="/businessplan/{{$idbp}}/createaction">Create Action</a></li>
                        <li value=1 selected="selected"><a href="/businessplan/{{$idbp}}/createtask">Create Task</a></li>
                    </ul>


                </div>
                @endif
                <hr>

                <div class="filtering">
                    <label id="filtering">Filter</label>
                    <div class="filterMenu dropDown" style="position:relative">
                        <button class="filterMenuDropdown btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="fa fa-cog"></span>
                            <span class="caret"></span>
                        </button>

                        <ul class="filterMenu dropdown-menu">
                            <li value="1" selected="selected" onClick="clearFilters()">Reset Filters</li>
                            <li value="1" selected="selected" onClick="sortAlpha()">Reset Sorting</li>
                            <li value="1" selected="selected" onClick="clearBoth()">Reset Both</li>
                        </ul>
                    </div>
                </div>

                <div class="goatSelector">
                    <label>Types </label>
                    <select id="GOAT" name="GOAT" multiple="multiple">
                        <option value="Goal" selected="selected">Goals</option>
                        <option value="Objective" selected="selected">Objectives</option>
                        <option value="Action" selected="selected">Actions</option>
                        <option value="Task" selected="selected">Tasks</option>
                    </select>
                </div>

                <div class="collabSelector">
                    <label>Collaborators </label>
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
                    <label>Leads </label>
                    <select id="lead" name="lead" multiple="multiple">
                        @foreach($users as $user)
                            <option value="{{$user->name}}" selected="selected">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="groupSelector">
                    <label>Groups </label>
                    <select id="group" name="group" multiple="multiple">
                        @foreach($groups as $group)
                            <option value="{{$group->name}}" selected="selected">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="progressSelector">
                    <label>Progress </label>
                    <select id="progress" name="progress" multiple="multiple">
                            <option value="0" selected="selected">Not Started</option>
                            <option value="1" selected="selected">In Progress</option>
                            <option value="2" selected="selected">Completed</option>
                    </select>
                </div>

                <div class="budgetBox">
                    <label class="budgetTitle">Budget </label>
                    <label class="budgetLabel">Greater Than </label>
                    <textarea class="ta" id="budgetFrom" cols="10" rows="1"></textarea>
                    <label class="budgetLabel">Less Than </label>
                    <textarea class="ta" id="budgetTo" cols="10" rows="1"></textarea>

                </div>

                <div class="datePicker">
                    <label class="dateTitle">Due Date </label>
                    <label class="dateLabel">From </label>
                    <input title="From: " type="text" id="datePicker" class="picker">
                    <label class="dateLabel">To </label>
                    <input title="To: " type="text" id="datePicker2" class="picker">
                </div>

                <div class="checkBoxes">
                    <label class="checkBoxesTitle">Show </label>
                    <div class="checkLabels">
                        <label id="checkFirst">BP</label>
                        <label id="checkSecond">NonBP</label>
                    </div>
                    <div class="check">
                        <input type="checkbox" id="check1" name="check1" checked>
                    </div>

                    <div class="check">
                        <input type="checkbox" id="check2" name="check2" checked>
                    </div>
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
                        <th data-column-id="bp" data-formatter="bp" data-header-css-class="bp" data-visible="false"></th>
                        <th data-column-id="progressCode" data-formatter="colorizer" data-header-css-class="progressCode" data-visible="false"><</th>
                    </tr>
                    </thead>
                    <tbody>

         @foreach($bpPlans as $bp)
            @if(substr_count($bp->ident, ".")==0)
            @if($tempGoal = $bp)
            @endif
            <tr>
                <td>{{$bp->id}}</td>
                <td>{{$bp->ident}}</td>
                <td>{{$tempGoal->name}}.{{$bp->ident}}</td>
                <td>Goal</td>
                @if ($tempGoal->bp)
                    <td>0</td>
                @else
                    <td>4</td>
                @endif
                <td>{{$bp->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$tempGoal->bp}}</td>
                <td></td>
            </tr>
            @endif
             @if(substr_count($bp->ident, ".")==1)
             @if($tempObj = $bp)
             @endif
                <tr>
                    <td>{{$bp->id}}</td>
                    <td>{{$bp->ident}}</td>
                    <td>{{$tempGoal->name}}.{{$tempGoal->ident}}.{{$tempObj->name}}.{{$bp->ident}}</td>
                    <td>Objective</td>
                    @if ($tempGoal->bp)
                        <td>1</td>
                    @else
                        <td>5</td>
                    @endif
                    <td>{{$tempGoal->name}}</td>
                    <td>--</td>
                    <td>--</td>
                    <td>{{$bp->name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$tempGoal->bp}}</td>
                    <td></td>
                </tr>
            @endif
              @if(substr_count($bp->ident, ".")==2)
                <tr>
                    <td>{{$bp->id}}</td>
                    <td>{{$bp->ident}}</td>
                    <td>{{$tempGoal->name}}.{{$tempGoal->ident}}.{{$tempObj->name}}.{{$bp->ident}}</td>
                    <td>Action</td>
                    @if ($tempGoal->bp)
                        <td>2</td>
                    @else
                        <td>6</td>
                    @endif
                    <td>{{$bp->description}}</td>
                    <td>{{$users[$bp->userId - 1]->name}}</td>
                    <td>{{$groups[$bp->group - 1]->name}}</td>
                    <td>{{$bp->collaborators}}</td>
                    <td>{{$bp->budget}}</td>
                    <td>{{$bp->successMeasured}}</td>
                    <td>{{$bp->date}}</td>
                    <td>{{$bp->progress}}</td>
                    <td></td>
                    <td>{{$tempGoal->bp}}</td>
                    <td>{{$bp->progress}}</td>
                </tr>
            @endif
            @if(substr_count($bp->ident, ".")==3)
            <tr>
                <td>{{$bp->id}}</td>
                <td>{{$bp->ident}}</td>
                <td>{{$tempGoal->name}}.{{$tempGoal->ident}}.{{$tempObj->name}}.{{$bp->ident}}</td>
                <td>Task</td>
                @if ($tempGoal->bp)
                    <td>3</td>
                @else
                    <td>7</td>
                @endif
                <td>{{$bp->description}}</td>
                <td>{{$users[$bp->userId - 1]->name}}</td>
                <td>{{$groups[$bp->group - 1]->name}}</td>
                <td>{{$bp->collaborators}}</td>
                <td>{{$bp->budget}}</td>
                <td>{{$bp->successMeasured}}</td>
                <td>{{$bp->date}}</td>
                <td>{{$bp->progress}}</td>
                <td></td>
                <td>{{$tempGoal->bp}}</td>
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
        {!! Html::script('javascript/tableExport.jquery.plugin-master/FileSaver.js') !!}
        {!! Html::script('javascript/tableExport.jquery.plugin-master/tableExport.js') !!}
        {!! Html::script('javascript/tableExport.jquery.plugin-master/jquery.base64.js') !!}
        {!! Html::script('javascript/tableExport.jquery.plugin-master/jspdf/jspdf.js') !!}
        {!! Html::script('javascript/jspdf.plugin.table.js') !!}

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
                        navigation: 1,
                        statusMapping: {
                            4: "nbpGoal",
                            5: "nbpObjective",
                            6: "nbpAction",
                            7: "nbpTask"
                        },
                        formatters: {
                            colorizer: function (column, row) {
                                if (column.id == "progress") {
                                    var prog = row.progress;
                                    if (prog < 0) {
                                        return "<div class=\"ico\"><span class=\"fa fa-fw\"></span></div>";
                                    }
                                    else if (prog == 0) {
                                        return "<div class=\"ico\"></div>";
                                    }
                                    else if (prog == 1) {
                                        return "<div class=\"ico\"><span class=\"fa fa-hourglass-1\"></span></div>";
                                    }
                                    else if (prog == 2) {
                                        return "<div class=\"ico\"><span class=\"fa fa-check\"></span></div>";
                                    }
                                    else {
                                        return "<div class=\"ico\"><span class=\"fa fa-fw\"></span></div>";
                                    }
                                }
                                else if (column.id == "desc") {
                                    return "<div class=\"descript\">" + row[column.id] + "</div>";
                                }
                                else if ((row[column.id] == "" || row[column.id] == "0") && (row["type"] == "Action" || row["type"] == "Task")) {
                                    return "<div class=\"center\">" + "-" + "</div>";
                                }
                                else if (column.id == "collabs" && row["type"] == "Objective"){
                                    return "<div class=\"objectiveTd\">" + row[column.id] + "</div>";
                                }
                                else {
                                    return "<div>" + row[column.id] + "</div>";
                                }
                            },
                            "commands": function (column, row) {
                                var returnString = "<div class=\"commandButtons\">";
                                if (row["type"] == "Action" || row["type"] == "Task") {
                                    returnString += "<button type=\"button\" class=\"btn btn-xs btn-default command-note\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-sticky-note-o\"></span></button> ";
                                    @if($thisUser == null || $permission == "0")
                                            returnString += "</div>";
                                            return returnString;
                                    @endif
                                    if("{{$permission}}" < "2"){
                                        if (row["user"] == "{{$thisUser->name}}") {
                                            returnString += "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-pencil\"></span></button> " +w
                                            "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-trash-o\"></span></button></div>";
                                        }
                                        else {
                                            returnString += "</div>";
                                        }
                                    }
                                    else if ("{{$permission}}" < "3") {
                                        @foreach ($thisGroups as $thisGroup)
                                            if (row["user"] == "{{$thisUser->name}}" || row["group"] == "{{$thisGroup->name}}") returnString += "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-pencil\"></span></button> " + "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-trash-o\"></span></button></div>"; @break
                                        @endforeach
                                    }
                                    else {
                                        returnString += "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-pencil\"></span></button> " +
                                                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-trash-o\"></span></button></div>";
                                    }
                                }
                                else {
                                    if("{{$permission}}" > "2") {
                                        returnString += "<div class=\"commandButtons\"><button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-pencil\"></span></button> " +
                                                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.ident + "\"><span class=\"fa fa-trash-o\"></span></button></div>";
                                    }
                                    else {
                                            returnString += "</div>";
                                    }
                                }
                                return returnString;
                            }
                        }
                    }).on("loaded.rs.jquery.bootgrid", function() {
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
            var progressMaxCount = 3;
            var progressSelector = $("#progress").multiselect({
                selectedList: 0,
                header: true,
                minWidth: "auto",
                position: {
                    my: 'right top',
                    at: 'right bottom'
                },
                click: function (event, ui) {
                    if (ui.checked) {
                        grid.bootgrid("addParams", ui.value, 15);
                        if (progressSelector.multiselect("getChecked").length == progressMaxCount){
                            grid.bootgrid("addParams", "", 15);
                        }
                    }
                    else {
                        grid.bootgrid("removeParams", "", 15);
                        grid.bootgrid("removeParams", ui.value, 15);
                    }
                },
                checkAll: function () {
                    grid.bootgrid("addParams", "0", 15);
                    grid.bootgrid("addParams", "1", 15);
                    grid.bootgrid("addParams", "2", 15);
                    grid.bootgrid("addParams", "", 15);
                },
                uncheckAll: function () {
                    grid.bootgrid("removeParams", undefined, 15);
                }
            });


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
                grid.bootgrid("sort");
                grid.bootgrid("sortRows");
            }

            var hierCheckValue = true;
            function setupCheckBox () {
                var hierCheck = document.getElementById("hierarchyCheckBox");
                hierCheck.addEventListener('click', function () {
                    hierCheckValue = !hierCheckValue;
                    if (hierCheckValue) {
                        grid.bootgrid("setSubtree", "true");
                    }
                    else {
                        grid.bootgrid("setSubtree", "false");
                    }
                });
            }

            var check1Value = true;
            var check1 = document.getElementById("check1");
            check1.addEventListener('click', function () {
                check1Value = !check1Value;
                if (check1Value) {
                    grid.bootgrid("addParams", "1", 14);
                }
                else {
                    if (!check2Value) {
                        check2.click();
                    }
                    grid.bootgrid("removeParams", "1", 14);
                }
            });

            var check2Value = true;
            var check2 = document.getElementById("check2");
            check2.addEventListener('click', function () {
                check2Value = !check2Value;
                if (check2Value) {
                    grid.bootgrid("addParams", "0", 14);
                }
                else {
                    if (!check1Value) {
                        check1.click();
                    }
                    grid.bootgrid("removeParams", "0", 14);
                }
            });

            function generateReportPDF () {
                var doc = new jsPDF('p', 'pt', 'a4', true);
                doc.setFont("courier", "normal");
                doc.setFontSize(8);
                height = doc.drawTable(grid.bootgrid("getCurrentRowsData"), {xstart:30,ystart:10,tablestart:70,marginleft:50,columnWidths:[125,75,75,80,40,100,30]});
                doc.text(50, height + 20, "{{$nameBP}}");
                doc.save("{{$nameBP}}" + ".pdf");
            }

            function clearFilters () {
                grid.bootgrid("clearParams");
                goatSelector.multiselect("uncheckAll");
                collabSelector.multiselect("uncheckAll");
                leadSelector.multiselect("uncheckAll");
                groupSelector.multiselect("uncheckAll");
                progressSelector.multiselect("uncheckAll");
                date1.datepicker("destroy");
                date2.datepicker("destroy");
                document.getElementById("datePicker").value = "";
                document.getElementById("datePicker2").value = "";
                setupDate1();
                setupDate2();
                if (!check1Value) check1.click();
                if (!check2Value) check2.click();
                document.getElementById("budgetFrom").value = "";
                document.getElementById("budgetTo").value = "";
            }

            function clearBoth () {
                clearFilters();
                sortAlpha();
            }

            function setFilters () {
                clearBoth();
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

                @if ($filters["objective"] != null)
                    grid.bootgrid("search", "{{$filters["objective"]->name}}");
                @endif
            }


            $(document).ready(function () {
                goatSelector.multiselect("uncheckAll");
                collabMaxCount = collabSelector.multiselect("getChecked").length;
                collabSelector.multiselect("uncheckAll");
                leadMaxCount = leadSelector.multiselect("getChecked").length;
                leadSelector.multiselect("uncheckAll");
                groupMaxCount = groupSelector.multiselect("getChecked").length;
                groupSelector.multiselect("uncheckAll");
                progressSelector.multiselect("uncheckAll");
                setupDate1();
                setupDate2();
                grid.bootgrid("addParams", "1", 14);
                grid.bootgrid("addParams", "0", 14);
                var rowCount = grid.bootgrid("getTotalRowCount");
                maxGoals = Math.ceil(rowCount * 0.15);
                maxObj = Math.ceil(rowCount * 0.35);
                maxActions = Math.ceil(rowCount * 0.65);
                maxTasks = Math.ceil(rowCount * 0.75);
                @if($filters != null)
                    setFilters();
                @endif
                grid.bootgrid("setSort", function (a, b){
                    if (a.secondaryIdent >= b.secondaryIdent) {
                        return 1;
                    }
                    else {
                        return -1;
                    }
                });
                sortAlpha();
                $(".actionBar").append("<div id=\"legend\">" +
                                            "<div id=\"goalLabelDiv\"><label id=\"goalLabel\">Goal</label></div>" +
                                            "<div id=\"goalLegend\">&nbsp;</div>" +

                                            "<div id=\"objectiveLabelDiv\"><label id=\"objectiveLabel\">Obj.</label></div>" +
                                            "<div id=\"objectiveLegend\">&nbsp;</div>" +

                                            "<div id=\"actionLabelDiv\"><label id=\"actionLabel\">Action</label></div>" +
                                            "<div id=\"actionLegend\">&nbsp;</div>" +

                                            "<div id=\"taskLabelDiv\"><label id=\"taskLabel\">Task</label></div>" +
                                            "<div id=\"taskLegend\">&nbsp;</div>" +

                                            "<div id=\"verticalRule\"></div>" +

                                            "<div id=\"bpLabelDiv\"><label id=\"bpLabel\">BP</label></div>" +
                                            "<div id=\"nonbpLabelDiv\"><label id=\"nonbpLabel\">NonBP</label></div>" +

                                            "<div id=\"verticalRule\"></div>" +

                                            "<div id=\"progressLegendLabel\"><label>In Progress</label></div>" +
                                            "<div id=\"progressLegendIcon\"><span class=\"fa fa-hourglass-1\"></span></div>" +

                                            "<div id=\"doneLegendLabel\"><label>Completed</label></div>" +
                                            "<div id=\"doneLegendIcon\"><span class=\"fa fa-check\"></span></div>" +

                                            "<div id=\"hierCheck\"><input type=\"checkbox\" id=\"hierarchyCheckBox\" name=\"hierarchyCheckBox\" checked></div>" +
                                            "<div id=\"hierLabel\"><label>Show sub-elements</label></div>" +
                                        "</div>");
                grid.bootgrid("setSubtree", "true");
                setupCheckBox();
                setTimeout(function() {
                    document.getElementById("tableDiv").style.visibility = 'visible';
                    document.getElementById("sideDiv").style.visibility = 'visible';
                    //document.styleSheets[1].insertRule('.dropdown {float: right;}', document.styleSheets[1].length);
                    //document.styleSheets[1].insertRule('.btn btn-primary dropdown-toggle {display:inline-block;}', document.styleSheets[1].length);
                    document.getElementById("bp-selector-button").style.float= 'right';
                    document.getElementById("bp-selector-button").style.visibility= 'visible';
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
