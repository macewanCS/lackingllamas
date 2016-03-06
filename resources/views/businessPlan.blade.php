@extends('layouts.app')

@section('content')
<style>
table, td {
    border: 1px solid black;
}
#title
{
	 margin-left: 10;
    margin-bottom: 10px;
	 padding:10px;
}
#goalCreateButton {
	border:1px #888888 solid;   
    background-color:#77bb77;
    padding: 2px;
    cursor: pointer;
    font-weight: bold;
}
#objectiveButton {
     border:1px #888888 solid;   
    padding:10px;
    background-color:#bbbbbb;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
    margin-left: 10;
    margin-bottom: 10px;
}
#table{
	margin-left: 10px;
	 margin-bottom: 10px;
	 width:98%
	}
#actionTR{ 
	background-color:#ddddf0;

}
input[type=submit] {
    -webkit-transition:all 0.3s ease-in-out;    
    -moz-transition:all 0.3s ease-in-out;
    -o-transition:all 0.3s ease-in-out;
    -ms-transition:all 0.3s ease-in-out;
    transition:all 0.3s ease-in-out;        
}
.container {
    width:100%;
    border:1px solid #d3d3d3;
}
.container div {

    width:100%;
}
.container .header {
    background-color:#d3d3d3;
    cursor: pointer;
    font-weight: bold;
    border:1px #ffffff solid; 
}
.container .content {
    display: none;
    padding : 5px;
}
</style>

<br>
<h2 id ="title"> Business Plan </h2>

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

	
	<br>
</div>
<div>
    <!--TODO work on dashboard -->
    This is where our dashBoard page goes!
</div>
	
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