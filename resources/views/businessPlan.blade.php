@extends('layouts.app')

@section('content')
<style>
table, td {
    border: 1px solid black;
}
#goalButton {
     border:2px #666666 solid;   
    padding:10px;
    background-color:#999999;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
    margin-left: 10px;
    margin-bottom: 5px;
}
#goalCreateButton {
     border:2px ##bbbbbb solid;   
    padding:10px;
    background-color:#77bb77;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
    margin-left: 10px;
    margin-bottom: 5px;
}
#objectiveButton {
     border:1px #888888 solid;   
    padding:10px;
    background-color:#bbbbbb;
    -webkit-border-radius:40px;
    -moz-border-radius:40px;
    border-radius:40px;
    margin-left: 40px;
    margin-bottom: 10px;
}
#table{
	margin-left: 60px;
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
</style>


<h1> Business Plan </h1>
@foreach ($goals as $goal)
	<div>
		<input id="goalButton" type="submit" value = "{{ $goal->name }}"></input>
	</div>
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
@endforeach
<div>
		<input  onclick="window.location='{{ url("businessplan/creategoal") }}'" id="goalCreateButton" type="submit" value = "Create Goal" ></input>
	</div>

<div class="container">
    <!--TODO work on dashboard -->
    This is where our dashBoard page goes!
</div>


<script>
	function createColumn()
	{
		var colums = ["Description","Date","Lead","Collaborators","Budget","Project Plan","Success Measured"];
	
		for(i =0;i<colums.length;i++)
		{
			document.write("<td>"+colums[i]+"</td>")
		}
	}

	function createGoal()
	{

	}
</script>
@stop