
@extends('layouts.app')

@section('content')

    {!! Html::style('css/createGoal.css') !!}
    <div class="create-action-container">
        <h1>
            Edit a Action
        </h1>
        <hr>
        <div class="create-goal-inner">


            {!! Form::model($action,['method' => 'PATCH', 'action' => ['BusinessPlanController@update',$idbp,Action, $action->id]]) !!}
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
                <br>

                {!! Form::label('group','Departments Teams: ',['class' => 'edit-action-label']) !!}
                {!! Form::select('group',$groups,null, array('class' => 'form-extras'))!!}
                <br><br>
                {!! Form::label('userId','Lead: ',['class' => 'edit-action-label']) !!}
                {!! Form::select('userId',$user,null, array('class' => 'form-extras'))!!}
                <br><br>
                {!! Form::label('progress','Progress: ',['class' => 'edit-action-label']) !!}
                {!! Form::text('progress', null, ['class' => 'edit-action-field']) !!}       
                <br><br>

                 <div id ="divBP">
                    {!! Form::label('bp','Non Business Plan Goal: ') !!}
                    {!! Form::checkbox('bp', 1, false) !!}
                    <p class="text">Checked to make it a Non Business Plan Goal?</p>
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
