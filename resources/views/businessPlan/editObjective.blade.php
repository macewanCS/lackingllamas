@extends('layouts.app')

@section('content')
	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
		<h1>
			Edit a Objective
		</h1>
		<hr>
		<div class="create-goal-inner">
		{!! Form::model($objective,['method' => 'PATCH', 'action' => ['BusinessPlanController@update',null,null,$objective->id]]) !!}
		<div class="form-group-one">
			{!! Form::label('goal_id','Goal: ',['class' => 'edit-action-label']) !!}
			{!! Form::select('goal_id',$goals,null, array('class' => 'form-extras'))!!}
			<br><br>
			{!! Form::label('name','Name: ',['class' => 'edit-action-label']) !!}
			{!! Form::text('name', null, ['class' => 'edit-action-field']) !!}
			<br><br>
			{!! Form::label('group','Departments Teams: ',['class' => 'edit-action-label']) !!}
			{!! Form::select('group',$groups,null, array('class' => 'form-extras'))!!}
                <div id ="divBP">
                    {!! Form::label('bp','Non Business Plan Goal: ') !!}
                    {!! Form::checkbox('bp', 1, false) !!}
                    <p class="text">Checked to make it a Non Business Plan Goal?</p>
                </div>
			{!! Form::submit('Edit Objective',['class'=>'btn-primary form-control','data-toggle' => 'tooltip']) !!}
		</div>

	

		{!! Form::close() !!}
		
	</div>
@stop
