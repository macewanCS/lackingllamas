@extends('layouts.app')

@section('content')
{!! Html::style('css/businessPlan.css') !!}

<br>
<br>
<h2 id ="title"> Business Plan </h2>

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
    <!--TODO work on dashboard -->

	
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
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