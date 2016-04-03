@extends('layouts.app')

@section('content')

	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
			<h1>Create a Goal</h1>
		<hr>
		<div class="create-goal-inner">
		{!! Form::open(['url'=>'businessplan']) !!}
			{!! Form::hidden('ident',$counted) !!}
			{!! Form::hidden('id',$counted) !!}
			{{ Form::hidden('bp', 'False') }}
			{{ Form::hidden('bpid', $idbp) }}

		<div class="form-group-one">
	
			{!! Form::label('name','Name:',['class' => 'edit-action-label']) !!}
			{!! Form::text('name', null, ['class' => 'edit-action-field']) !!}
			<br><br>
			{!! Form::label('group','Departments Teams:',['class' => 'edit-action-label']) !!}
			{!! Form::select('group',$groups,null, array('class' => 'form-extras'))!!}
			<br><br>

                <div id ="divBP">
                    {!! Form::label('bp','Non Business Plan Goal: ') !!}
                    {!! Form::checkbox('bp', 'True', false) !!}
                    <p class="text">Checking the box will seperate the goal from the business plan</p>
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


