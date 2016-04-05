@extends('layouts.app')

@section('content')
	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
		<h1>Edit a Goal</h1>
		<h2>
			Business Plan: {{App\BusinessPlan::find($idbp)->name}}
		</h2>
		<hr>
		<div class="create-goal-inner">
		{!! Form::model($goal,['method' => 'PATCH', 'action' => ['BusinessPlanController@update', $goal->bpid,'Goal',$goal->id]]) !!}
 		{!! Form::hidden('goal','a') !!}
		<div class="form-group-one">
	
			{!! Form::label('name','Name ',['class' => 'edit-action-label']) !!}
			{!! Form::text('name', null, ['class' => 'edit-action-field']) !!}
			<br><br>
           
		</div>

		<div class="form-group-two">
			<br><br>
			{!! Form::submit('Submit Changes',['class'=>'btn-primary form-control']) !!}
		</div>

		{!! Form::close() !!}
		</div>
	</div>


@stop


