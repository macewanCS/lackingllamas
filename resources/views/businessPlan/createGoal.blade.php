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
			{!! Form::hidden('teamOrDeptId', 1) !!}
			{!! Form::hidden('ident', 1) !!}
			<br>
			{!! Form::label('group','Group: ') !!}
			{!! Form::select('group',$groups)!!}

		<div id ="divBP">
		{!! Form::label('bp','BusinessPlan: ') !!}
		{!! Form::checkbox('bp', 1, true) !!}
		<p class="text">Part of Business Plan? Checked means yes</p>
		</div>
		</div>
		<div class="form-group-two">
			<br><br>
			{!! Form::submit('Add Goal',['class'=>'btn-primary form-control']) !!}
		</div>

		{!! Form::close() !!}
		</div>
	</div>
@stop


