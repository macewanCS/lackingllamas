@extends('layouts.app')

@section('endHead')
        {!! Html::style('css/jquery.treetable.css') !!}
        {!! Html::style('css/jquery.treetable.theme.default.css') !!}
		{!! Html::style('css/treeTableStyle.css') !!}
		{!! Html::style('css/businessPlan.css') !!}
        {!! Html::style('http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') !!}
@stop

@section('content')


<br>
<br>
<h2 id ="title"> Business Plan </h2>

<div style="display: inline-block">
<button id="topButtons" onClick="showTree()">Graphical View</button>
<button id="topButtons" onClick="showGrid()">Tree Grid View</button>
</div>

<div style="display: inline-block">
	<container id="complete">
    	<div class="boxCompleted" style="display: inline-block"></div>
		<div style="display: inline-block">Completed</div>
	</container>
    <div class="boxLow" style="display: inline-block"></div>
    <div style="display: inline-block">Low Priority</div>
    <div class="boxHigh" style="display: inline-block"></div>
    <div style="display: inline-block">High Priority</div>
    <div class="boxUrgent" style="display: inline-block"></div>
    <div style="display: inline-block">Urgent</div>
    <div class="boxNone" style="display: inline-block"></div>
    <div style="display: inline-block">No Priority</div>
</div>

<div id="select" style="display: inline-block; margin-left: 50px">
    <label style="display: inline-block">SortBy: </label>
    <select name="sortBy" id="sortBy" style="display: inline-block">
        <option value="Desc.">Desc.</option>
        <option value="Date">Date</option>
        <option value="Leads">Leads</option>
        <option value="Collabs">Collabs</option>
        <option value="Budget">Budget</option>
    </select>
</div>


<div style="float: right">
<button id="collapseButtons" onClick="collapseAll()">CollapseAll</button>
<button id="collapseButtons" onClick="expandAll()">ExpandAll</button>
</div>



<div class = "notificationsTable">

<input  onclick="window.location='{{ url("businessplan/creategoal") }}'" id="goalCreateButton" type="submit" value = "Create Goal" ></input>
<div class = "container">
@foreach ($goals as $goal)
	<div class = "container">
	<div class = "header"data-myatt="{{ $goal->name }}">
		<span>{{ $goal->name }}</span>
	
	</div>
	<div class = "content">
	@foreach($objectives as $objective)
		@if($objective->goal_id==$goal->id)
		<div>	
			<input id="objectiveButton" type="submit" value = "{{ $objective->name }}"></input>
		</div>

		<table id ="table">
			<tr>
				<td>Description</td>
				<td>Date</td>
				<td>Lead</td>
				<td>Collaborators</td>
				<td>Budget</td>
				<td>Project Plan</td>
				<td>Success Measured</td>
			</tr>
			@foreach($actions as $action)
				@if($action->objective_id==$objective->id)
					<tr id = "actionTR">
						<td>{{$action->description}}</td>
						<td>{{$action->date}}</td>
						<td>{{$action->lead}}</td>
						<td>{{$action->collaborators}}</td>
						<td>{{$action->budget}}</td>
						<td>{{$action->projectPlan}}</td>
						<td>{{$action->successMeasured}}</td>
					</tr>

				@foreach($tasks as $task)
					@if($task->action_id==$action->id)
						<tr>
							<td>{{$task->description}}</td>
							<td>{{$task->date}}</td>
							<td>{{$task->lead}}</td>
							<td>{{$task->collaborators}}</td>
							<td>{{$task->budget}}</td>
							<td>{{$task->projectPlan}}</td>
							<td>{{$task->successMeasured}}</td>
						</tr>
					@endif
  				@endforeach
  				@endif
  			@endforeach
 
		</table>
		@endif
	@endforeach
	</div>
	</div>
@endforeach

	
	
</div>
</div>


<table id="treeTableView">
	<thead>
	<tr>
        <th>Identifier</th>
		<th>Description of GOAT Element</th>
		<th>Date</th>
		<th>Lead</th>
		<th>Collaborators</th>
		<th>Budget</th>
		<th>Project Plan</th>
		<th>Success Measures</th>
	</tr>
	</thead>
	<tbody>
	@foreach($goals as $goal)
		<tr id="tree-goal" data-tt-id="{{$goal->ident}}">
            <td>{{$goal->ident}}</td>
			<td>{{$goal->name}}</td>
		</tr>
		@foreach($objectives as $objective)
			@if($objective->goal_id==$goal->id)
				<tr id="tree-objective" data-tt-id="{{$objective->ident}}" data-tt-parent-id="{{$goal->ident}}">
					<td>{{$objective->ident}}</td>
                    <td>{{$objective->name}}</td>
				</tr>
				@foreach($actions as $action)
					@if($action->objective_id==$objective->id)
                        @if($action->priority > -1)
                            @if($action->priority == 0)
                                <tr id="tree-action" data-tt-id="{{$action->ident}}" data-tt-parent-id="{{$objective->ident}}" style="background-color: white;">
                            @elseif($action->priority == 1)
                                <tr id="tree-action" data-tt-id="{{$action->ident}}" data-tt-parent-id="{{$objective->ident}}" style="background-color: red;">
                            @elseif($action->priority == 2)
                                <tr id="tree-action" data-tt-id="{{$action->ident}}" data-tt-parent-id="{{$objective->ident}}" style="background-color: orange;">
                            @elseif($action->priority == 3)
                                <tr id="tree-action" data-tt-id="{{$action->ident}}" data-tt-parent-id="{{$objective->ident}}" style="background-color: yellow;">
                            @endif
                        @else
                            <tr id="tree-action" data-tt-id="{{$action->ident}}" data-tt-parent-id="{{$objective->ident}}" style="background-color: green;">
                        @endif
                            <td>{{$action->ident}}</td>
							<td>{{$action->description}}</td>
							<td>{{$action->date}}</td>
							<td>{{$action->leads}}</td>
							<td>{{$action->collaborators}}</td>
							<td>{{$action->budget}}</td>
							<td>{{$action->projectPlan}}</td>
							<td>{{$action->successMeasured}}</td>
						</tr>
						@foreach($tasks as $task)
							@if($task->action_id==$action->id)
                                <tr id="tree-task" data-tt-id="{{ $task->ident }}" data-tt-parent-id="{{$action->ident}}">
									<td>{{$task->ident}}</td>
                                    <td>{{$task->description}}</td>
									<td>{{$task->date}}</td>
									<td>{{$task->leads}}</td>
									<td>{{$task->collaborators}}</td>
									<td>{{$task->budget}}</td>
									<td>{{$task->projectPlan}}</td>
									<td>{{$task->successMeasured}}</td>
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

@stop

@section('scripts')
		<!-- <link rel="stylesheet" href="/public/javascript/jquery-ui.css"> -->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
{!! Html::script('javascript/jquery.treetable.js') !!}

<script>
	$("#treeTableView").treetable({ expandable: true, initialState: "expanded", column: 1 });
	$("#treeTableView").hide();

    $("#sortBy").selectmenu();
    $("#sortBy").selectmenu({
        select: function(event, ui){

            if ('Date' == ui.item.value){
                sortDate();
                window.alert("got here");
            }
        }
    });

	function showTree(){
		$("#treeTableView").hide();
		$(".notificationsTable").show();
	}

	function showGrid(){
		$("#treeTableView").show();
		$(".notificationsTable").hide();
	}

    function collapseAll() {
        $("#treeTableView").treetable("collapseAll");
    }

    function expandAll() {
        $("#treeTableView").treetable("expandAll");
    }

    function sortDate(){
 /*       @foreach($objectives as $obj)
            var objNode = $("#treeTableView").treetable('node', "1");
            if (objNode == null) window.alert("Damn");
            $("#treeTreeView").treetable('sortBranch', objNode, 3);
        @endforeach

        @foreach($actions as $action)
              var actNode = $("#treeTableView").treetable('node', "{{$action->ident}}");
              $("#treeTableView").treetable('sortBranch', actNode, 3);
        @endforeach
*/
    }
</script>

<script>
	$(".header").click(function () {

		$header = $(this);
		//getting the next element
		$content = $header.next();
		//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
		$content.slideToggle(500, function () {
			//execute this after slideToggle is done
			//change text of header based on visibility of content div

			$header.text(function () {
				//change text based on condition
				return $content.is(":visible") ? "Collapse" : $header.data('myatt')
			});
		});

	});
</script>


@stop



