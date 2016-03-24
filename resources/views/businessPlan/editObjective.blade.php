@extends('layouts.app')

@section('content')
	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
		<h1>
			Edit a Objective
		</h1>
		<hr>
		<div class="create-goal-inner">


		{!! Form::model($objective,['method' => 'PATCH', 'action' => ['BusinessPlanController@update', $objective->id]]) !!}
		<div class="form-group-one">

			{!! Form::label('goal_id','Goal: ') !!}

			{!! Form::select('goal_id',$goals, null, ['class' => 'create-action-dropdown'])!!}


			<br><br>
			{!! Form::label('name','Name: ') !!}

			{!! Form::text('name', null, ['class' => 'create-action-text-field']) !!}
			
			{!! Form::hidden('teamOrDeptId', 1) !!}
		
			<div id ="divBP">
				{!! Form::label('bp','BusinessPlan: ') !!}
				{!! Form::checkbox('bp', 1, true) !!}
				<p class="text">Part of Business Plan? Checked means yes</p>
			</div>


			{!! Form::submit('Edit Objective',['class'=>'btn-primary form-control','data-toggle' => 'tooltip']) !!}
		</div>

	

		{!! Form::close() !!}
		
	</div>
@stop
