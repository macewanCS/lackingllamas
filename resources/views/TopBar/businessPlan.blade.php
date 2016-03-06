@extends('layouts.app')

@section('endHead')
   <!-- <link rel="stylesheet" href="http://ludo.cubicphuse.nl/jquery-treetable/css/screen.css" />-->
    <link rel="stylesheet" href="http://ludo.cubicphuse.nl/jquery-treetable/css/jquery.treetable.css" />
    <link rel="stylesheet" href="http://ludo.cubicphuse.nl/jquery-treetable/css/jquery.treetable.theme.default.css" />
    {!! Html::style('css/treeTableStyle.css') !!}
@stop

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




<table id="atest">
    <thead>
        <tr>
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
        <tr id="tree-goal" data-tt-id="{{$goal->id}}">
            <td>{{$goal->name}}</td>
        </tr>
        @foreach($objectives as $objective)
            @if($objective->goal_id==$goal->id)
            <tr id="tree-objective" data-tt-id="{{$goal->id}}.{{$objective->id}}" data-tt-parent-id="{{$goal->id}}">
                <td>{{$objective->name}}</td>
            </tr>
            @foreach($actions as $action)
                @if($action->objective_id==$objective->id)
                <tr id="tree-action" data-tt-id="{{$goal->id}}.{{$objective->id}}.{{$action->id}}" data-tt-parent-id="{{$goal->id}}.{{$objective->id}}">
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
                    <tr id="tree-task" data-tt-id="{{$goal->id}}.{{$objective->id}}.{{$action->id}}.{{$task->id}}" data-tt-parent-id="{{$goal->id}}.{{$objective->id}}.{{$action->id}}">
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
            @endif
        @endforeach
    @endforeach

    </tbody>
</table>

@stop

@section('scripts')
   <!-- <link rel="stylesheet" href="/public/javascript/jquery-ui.css"> -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="http://ludo.cubicphuse.nl/jquery-treetable/jquery.treetable.js"></script>

    <script>
            $("#atest").treetable({ expandable: true, initialState: "expanded" });
    </script>
@stop