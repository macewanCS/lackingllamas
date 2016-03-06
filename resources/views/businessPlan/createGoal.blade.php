@extends('layouts.app')

@section('content')
	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
		<div class="create-goal-inner">
		<h2>
			Create a Goal
		</h2>
		{!! Form::open(['url'=>'businessplan']) !!}

		<div class="form-group-one">
			{!! Form::label('name','Name: ') !!}
			{!! Form::text('name') !!}
		</div>

		<div class="form-group-two">
			{!! Form::submit('Add Goal',['class'=>'btn-primary form-control']) !!}
		</div>

		{!! Form::close() !!}
		</div>
	</div>
@stop


