@extends('layouts.app')

@section('content')
	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
		<h1>Edit a Goal</h1>
		<hr>
		<div class="create-goal-inner">
		{!! Form::model($goal,['method' => 'PATCH', 'action' => ['BusinessPlanController@update', null,$goal->id]]) !!}

		<div class="form-group-one">
			{!! Form::label('bpid','BP:',['class' => 'edit-action-label']) !!}
			{!! Form::select('bpid',$bp,null, array('class' => 'form-extras'))!!}
			<br><br>
			{!! Form::label('name','Name:',['class' => 'edit-action-label']) !!}
			{!! Form::text('name', null, ['class' => 'edit-action-field']) !!}
			<br><br>
			{!! Form::label('group','Departments Teams:',['class' => 'edit-action-label']) !!}
			{!! Form::select('group',$groups,null, array('class' => 'form-extras'))!!}
			<br><br>
                <div id ="divBP">
                    {!! Form::label('bp','Non Business Plan Goal: ') !!}
                    {!! Form::checkbox('bp', 1, false) !!}
                    <p class="text">Checked to make it a Non Business Plan Goal?</p>
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


