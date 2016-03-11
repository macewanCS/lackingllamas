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
			{!! Form::select('goal_id',$goals,null,['class'=>'form-control'])!!}
			<br>
			{!! Form::label('name','Name: ') !!}
			{!! Form::text('name') !!}


		</div>

		<div class="form-group-two">
			{!! Form::submit('Add Objective',['class'=>'btn-primary form-control']) !!}
		</div>

		{!! Form::close() !!}
		</div>
	</div>
@stop
