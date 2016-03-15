@extends('layouts.app')

@section('endHead')
		{!! Html::style('css/Template.css') !!}
		{!! Html::style('css/businessPlan.css') !!}
        {!! Html::style('http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') !!}
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
@stop





@section('content')

<div id="mainDiv">

 <div class="dropDown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="/businessplan/creategoal">Create Goal</a>
    <a href="/businessplan/createobjective">Create Objective</a>
    <a href="/businessplan/createaction">Create Action</a>
    <a href="/businessplan/createtask">Create Task</a>
  </div>
</div>

<table id="grid-basic"  class="table table-condensed table-hover table-striped bootgrid-table">
	<thead>
        <tr>
            <th data-column-id="identifier">Identifier</th>
            <th data-column-id="desc">Description of GOAT Element</th>
            <th data-column-id="date">Date</th>
            <th data-column-id="collabs">Collaborators</th>
            <th data-column-id="budget">Budget</th>
            <th data-column-id="success">Success Measures</th>
            <th data-column-id="user">Assigned User</th>
            <th data-column-id="group">Assigned Group</th>
        </tr>
	</thead>
	<tbody>
	    @foreach($goals as $goal)
		    @foreach($objectives as $objective)
                @if($objective->goal_id==$goal->id)
                    <tr id="go">
                        <td id="progress"></td>
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
                       <tr id="action">
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
                                 <tr id="task">
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
@stop

@section('scripts')
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		{!! Html::script('javascript/jquery.bootgrid.js') !!}
		{!! Html::script('javascript/jquery.bootgrid.fa.js') !!}

<script>
	$("#grid-basic").bootgrid();
</script>
<script>
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
</script>

@stop