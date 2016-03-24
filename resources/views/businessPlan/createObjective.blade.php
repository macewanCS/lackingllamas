@extends('layouts.app')

@section('content')
	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
		
		<h1>
			Create a Objective
		</h1>
		<hr>
		<div class="create-goal-inner">
		{!! Form::open(['url'=>'businessplan']) !!}
			{!! Form::hidden('id',$counted) !!}
			{!! Form::hidden('ident',0) !!}
			<div class="form-group-one">
		<div class="form-group-one">
			{!! Form::label('goal_id','Goal: ',['class' => 'edit-action-label']) !!}
			{!! Form::select('goal_id',$goals,null, array('class' => 'form-extras'))!!}
			<br><br>
			{!! Form::label('name','Name: ',['class' => 'edit-action-label']) !!}
			{!! Form::text('name', null, ['class' => 'edit-action-field']) !!}
			<br><br>
			{!! Form::label('group','Group: ',['class' => 'edit-action-label']) !!}
			{!! Form::select('group',$groups,null, array('class' => 'form-extras'))!!}
                <div id ="divBP">
                    {!! Form::label('bp','Non Business Plan Goal: ') !!}
                    {!! Form::checkbox('bp', 1, false) !!}
                    <p class="text">Checked to make it a Non Business Plan Goal?</p>
                </div>
			</div>
				<div class="form-group-two">
					{!! Form::submit('Add Objective',['class'=>'btn-primary form-control','data-toggle' => 'tooltip']) !!}
				</div>
		{!! Form::close() !!}
			</div>	
	</div>
@stop
