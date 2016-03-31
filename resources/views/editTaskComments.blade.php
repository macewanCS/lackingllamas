
@extends('layouts.app')

@section('content')

    {!! Html::style('css/createGoal.css') !!}
    <div class="create-action-container">
        <h1>
            Edit a Task
        </h1>
        <h2>
            Business Plan: {{App\BusinessPlan::find($bpid)->name}}
        </h2>
        <hr>
        <div class="create-goal-inner">

            {!! Form::model($task,['method' => 'PATCH', 'action' => ['TaskCommentsController@updateTask', $task->id]]) !!}
            <div class="form-group-one">

                {!! Form::label('action_id','Action: ', ['class' => 'edit-task-label']) !!}
                {!! Form::text('action_id',$action, array('class' => 'edit-action-field', 'disabled' => 'disabled'))!!}<br>

                <br>
                {!! Form::label('description','Name: ', ['class' => 'edit-task-label']) !!}
                {!! Form::text('description', null, ['class' => 'edit-action-field']) !!}<br>

                <br>
                {!! Form::label('date','Date: ', ['class' => 'edit-task-label']) !!}
                {!! Form::input('date','date', $task->date, ['class' => 'form-extras']) !!}<br>

                <br>

                {!! Form::label('collaborators','Collaborators: ', ['class' => 'edit-task-label']) !!}
                {!! Form::text('collaborators', null, ['class' => 'edit-action-field']) !!}<br>

                <br>
                {!! Form::label('budget','Budget: ', ['class' => 'edit-task-label']) !!}
                {!! Form::text('budget', null, ['class' => 'edit-action-field']) !!}       <br>

                <br>
                {!! Form::label('projectPlan','Project Plan: ', ['class' => 'edit-task-label']) !!}
                {!! Form::text('projectPlan', null, ['class' => 'edit-action-field']) !!}  <br>

                <br>
                {!! Form::label('successMeasured','Success Measured: ', ['class' => 'edit-task-label']) !!}
                {!! Form::text('successMeasured', null, ['class' => 'edit-action-field']) !!} <br>

                <br>
                {!! Form::label('priority','Priority: ', ['class' => 'edit-task-label']) !!}
                {!! Form::text('priority', null, ['class' => 'edit-action-field']) !!} <br><br>


                {!! Form::label('group','Group Lead: ',['class' => 'edit-action-label']) !!}
                @if(!App\User::find(Auth::id())->hasRole('bpLead'))
                    {!! Form::text('group',App\Group::find($task->group)->name,array('class' => 'form-extras', 'disabled' => 'disabled'))!!}
                @else
                    {!! Form::select('group',$groups, null, array('class' => 'form-extras'))!!}
                @endif
                <br><br>
                {!! Form::label('userId','User Lead: ',['class' => 'edit-action-label']) !!}
                {!! Form::select('userId',$users, null, array('class' => 'form-extras'))!!}
                <br><br>
                {!! Form::label('progress','Progress: ',['class' => 'edit-action-label']) !!}
                {!! Form::text('progress', null, ['class' => 'edit-action-field']) !!}
                <br><br>



            {!! Form::submit('Submit Changes',['class'=>'btn-primary-action form-control','data-toggle' => 'tooltip']) !!}




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
