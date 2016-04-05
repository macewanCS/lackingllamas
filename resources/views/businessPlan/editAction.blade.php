
@extends('layouts.app')

@section('content')

    {!! Html::style('css/createGoal.css') !!}
    <div class="create-action-container">
        <h1>
            Edit a Action
        </h1>
        <h2>
            Business Plan: {{App\BusinessPlan::find($idbp)->name}}
        </h2>
        <hr>
        <div class="create-goal-inner">


            {!! Form::model($action,['method' => 'PATCH', 'action' => ['BusinessPlanController@update',$idbp,'Action', $action->id]]) !!}
             {!! Form::hidden('action','a') !!}

            <div class="form-group-one">

                {!! Form::label('description','Name: ', ['class' => 'edit-action-label']) !!}
                {!! Form::text('description', null, ['class' => 'edit-action-field']) !!}

                <br><br>
                {!! Form::label('date','Date: ', ['class' => 'edit-action-label']) !!}
                {!! Form::input('date','date', date('Y-m-d'), ['class' => 'form-extras']) !!}<br>

                <br>
                {!! Form::label('collaborators','Collaborators: ', ['class' => 'edit-task-label']) !!}
                {!! Form::select('collaborators-groups[]', $groups, $selectedGroups, ['multiple' => true, 'class' => 'edit-action-field', 'id' => 'collab-selectors-groups'] ) !!}
                {!! Form::select('collaborators-users[]', $users, $selectedUsers, ['multiple' => true, 'class' => 'edit-action-field', 'id' => 'collab-selectors-users'] ) !!}
                <div class="tooltiptext">Hold CTRL to select multiple elements</div>
                <br>
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
                {!! Form::select('progress',$progress, null, array('class' => 'form-extras'))!!}      
                <br><br>


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
