
@extends('layouts.app')

@section('content')

    {!! Html::style('css/createGoal.css') !!}
    <div class="create-action-container">
        <h1>
            Edit a Action
        </h1>
        <hr>
        <div class="create-goal-inner">


            {!! Form::model($action,['method' => 'PATCH', 'action' => ['BusinessPlanController@update', $action->id]]) !!}
            <div class="form-group-one">

                {!! Form::label('objective_id','Objective: ', ['class' => 'edit-action-label']) !!}
                {!! Form::select('objective_id',$objectives,null, array('class' => 'form-extras'))!!}<br>

                <br>
                {!! Form::label('description','Name: ', ['class' => 'edit-action-label']) !!}
                {!! Form::text('description', null, ['class' => 'edit-action-field']) !!}

                <br><br>
                {!! Form::label('date','Date: ', ['class' => 'edit-action-label']) !!}
                {!! Form::input('date','date', date('Y-m-d'), ['class' => 'form-extras']) !!}<br>

                <br>
                {!! Form::label('leads','Leads: ', ['class' => 'edit-action-label']) !!}
                {!! Form::text('leads', null, ['class' => 'edit-action-field']) !!}<br>

                <br>
                {!! Form::label('collaborators','Collaborators: ', ['class' => 'edit-action-label']) !!}
                {!! Form::text('collaborators', null, ['class' => 'edit-action-field']) !!}<br>

                <br>
                {!! Form::label('budget','Budget: ', ['class' => 'edit-action-label']) !!}
                {!! Form::text('budget', null, ['class' => 'edit-action-field']) !!}       <br>

                <br>
                {!! Form::label('projectPlan','Project Plan: ', ['class' => 'edit-action-label']) !!}
                {!! Form::text('projectPlan', null, ['class' => 'edit-action-field']) !!}  <br>

                <br>
                {!! Form::label('successMeasured','Success Measured: ', ['class' => 'edit-action-label']) !!}
                {!! Form::text('successMeasured', null, ['class' => 'edit-action-field']) !!} <br>

                <br>
                {!! Form::label('priority','Priority: ', ['class' => 'edit-action-label']) !!}
                {!! Form::text('priority', null, ['class' => 'edit-action-field']) !!} <br>
                {!! Form::hidden('teamOrDeptId', 1) !!}
                <br>
                <div id ="test">
                    {!! Form::label('bp','Business Plan: ', ['class' => 'edit-action-label']) !!}
                    {!! Form::checkbox('bp', 1, true) !!}

                    <p class="divBP">Part of Business Plan? Checked means yes</p>
                </div>
            </div>


            {!! Form::submit('Edit Action',['class'=>'btn-primary-action form-control ','data-toggle' => 'tooltip']) !!}


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
