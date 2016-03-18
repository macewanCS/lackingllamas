@extends('layouts.app')

@section('content')
	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
		<div class="create-goal-inner">
		<h2>
			Create a Objective
		</h2>


		
		{!! Form::open(['url'=>'businessplan']) !!}

		<div class="form-group-one">

			{!! Form::label('goal_id','Goal: ') !!}
			<br>
			{!! Form::select('goal_id',$goals)!!}


			<br><br>
			{!! Form::label('name','Name: ') !!}
			<br>
			{!! Form::text('name') !!}
			
			{!! Form::submit('Add Objective',['class'=>'btn-primary form-control','data-toggle' => 'tooltip']) !!}
			{!! Form::hidden('teamOrDeptId', 1) !!}
			{!! Form::hidden('bp', true) !!}

		</div>

	

		{!! Form::close() !!}
		
	</div>
@stop
