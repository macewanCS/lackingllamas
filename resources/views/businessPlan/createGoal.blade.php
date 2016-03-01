@extends('layouts.app')

@section('content')
<h1>
Create Goal
</h1>
{!! Form::open(['url'=>'businessplan']) !!}

	<div class="form-group">
		{!! Form::label('name','Name') !!}
		{!! Form::text('name') !!}
	</div>

	<div class="form-group">
	{!! Form::submit('Add Goal',['class'=>'btn-primary form-control']) !!}
	</div>

{!! Form::close() !!}
@stop


