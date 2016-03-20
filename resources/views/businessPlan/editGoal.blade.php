@extends('layouts.app')

@section('content')
	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
		<div class="create-goal-inner">
		<h2>
			Edit a Goal
		</h2>
		{!! Form::model($goal,['method' => 'PATCH', 'action' => ['BusinessPlanController@update', $goal->id]]) !!}

		<div class="form-group-one">
			{!! Form::label('name','Name: ') !!}
			{!! Form::text('name') !!}
			{!! Form::hidden('bpid', 1) !!}	
		<div id ="divBP">
			{!! Form::label('bp','BusinessPlan: ') !!}
			{!! Form::checkbox('bp', 1, true) !!}
		<p class="text">Part of Business Plan? Checked means yes</p>
		</div>
		</div>

		<div class="form-group-two">
			<br><br>
			{!! Form::submit('Edit Goal',['class'=>'btn-primary form-control']) !!}
		</div>

		{!! Form::close() !!}
		</div>
	</div>
@stop


