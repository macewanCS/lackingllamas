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
			<br>
			{!! Form::select('goal_id',$goals)!!}


			<br><br>
			{!! Form::label('name','Name: ') !!}
			<br>
			{!! Form::text('name') !!}
			{!! Form::hidden('id',$counted) !!}
			{!! Form::hidden('ident',0) !!}
			{!! Form::label('group','Group: ') !!}
			{!! Form::select('group',$groups)!!}		
			<div id ="divBP">
				{!! Form::label('bp','BusinessPlan: ') !!}
				{!! Form::checkbox('bp', 1, true) !!}
				<p class="text">Part of Business Plan? Checked means yes</p>
			</div>


			{!! Form::submit('Add Objective',['class'=>'btn-primary form-control','data-toggle' => 'tooltip']) !!}
		</div>

	

		{!! Form::close() !!}
		
	</div>
@stop
