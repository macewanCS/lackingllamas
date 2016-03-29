@extends('layouts.app')

@section('content')

	{!! Html::style('css/createGoal.css') !!}
	<div class="create-goal-container">
			<h1>Edit a BP</h1>
		<hr>
		<div class="create-goal-inner">
		{!! Form::model($bp,['method' => 'PATCH', 'action' => ['BusinessPlanController@update', $bp->id,null,null]]) !!}
		<div class="form-group-one">
			{!! Form::label('name','Name:',['class' => 'edit-action-label']) !!}
			{!! Form::text('name', null, ['class' => 'edit-action-field']) !!}

			<br><br>
            {!! Form::label('created','Date Start: ', ['class' => 'edit-action-label']) !!}
            {!! Form::input('created','date', date('Y-m-d'), ['class' => 'form-extras']) !!}
            <br><br>
            {!! Form::label('ending','Date End: ', ['class' => 'edit-action-label']) !!}
            {!! Form::input('ending','date', date('Y-m-d'), ['class' => 'form-extras']) !!}
            <br><br>  
		</div>

		<div class="form-group-two">
			<br><br>
			{!! Form::submit('Edit BP',['class'=>'btn-primary form-control']) !!}
		</div>

		{!! Form::close() !!}
		</div>
	</div>
@stop

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>