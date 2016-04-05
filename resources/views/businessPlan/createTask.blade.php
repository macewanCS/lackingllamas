
@extends('layouts.app')

@section('content')

      {!! Html::style('css/createGoal.css') !!}
      <div class="create-action-container">
            <div class="create-goal-inner">
            <h2>
                  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
                  Create a Task
            </h2>


            
            {!! Form::open(['url'=>'businessplan']) !!}
                
                  {!! Form::hidden('ident',0) !!}
                    {!! Form::hidden('idbp',$idbp) !!}
                  <div class="form-group-one">

                  {!! Form::label('action_id','Action ',['class' => 'edit-action-label']) !!}
                  {!! Form::select('action_id',$actions,null, array('class' => 'form-extras'))!!}
                  <br><br>

                
                  {!! Form::label('description','Name ', ['class' => 'edit-action-label']) !!}
                  {!! Form::text('description', null, ['class' => 'edit-action-field']) !!}
                  <br><br>

                  {!! Form::label('date','Date ', ['class' => 'edit-action-label']) !!}
                  {!! Form::input('date','date', date('Y-m-d'), ['class' => 'form-extras']) !!}
                  <br><br>

                {!! Form::label('collaborators','Collaborators ', ['class' => 'edit-task-label']) !!}
                {!! Form::select('collaborators-groups[]', $groups,$selectedGroups, ['multiple' => true, 'class' => 'edit-action-field', 'id' => 'collab-selectors-groups'] ) !!}
                {!! Form::select('collaborators-users[]', $users, $selectedUsers, ['multiple' => true, 'class' => 'edit-action-field', 'id' => 'collab-selectors-users'] ) !!} 
                 <div class="tooltiptext">Hold CTRL to select multiple elements</div> 

                  {!! Form::label('budget','Budget ', ['class' => 'edit-action-label']) !!}
                  {!! Form::text('budget', null, ['class' => 'edit-action-field']) !!}       
                  <br><br>
                           
                  {!! Form::label('projectPlan','Project Plan ',['class' => 'edit-action-label']) !!}
                  {!! Form::text('projectPlan', null, ['class' => 'edit-action-field']) !!}  
                  <br><br>

                  {!! Form::label('successMeasured','Success Measured ',['class' => 'edit-action-label']) !!}
                  {!! Form::text('successMeasured', null, ['class' => 'edit-action-field']) !!} 
                  <br><br>

                  {!! Form::label('priority','Priority ',['class' => 'edit-action-label']) !!}
                  {!! Form::text('priority', null, ['class' => 'edit-action-field']) !!} 
                  <br><br>

                  {!! Form::label('group','Group Lead ',['class' => 'edit-action-label']) !!}
                  {!! Form::select('group',$groups,null, array('class' => 'form-extras'))!!}
                  <br><br>
                  {!! Form::label('userId','User Lead ',['class' => 'edit-action-label']) !!}
                  {!! Form::select('userId',$user,null, array('class' => 'form-extras'))!!}
                  <br><br>
                {!! Form::label('progress','Progress ',['class' => 'edit-action-label']) !!}
                {!! Form::select('progress',$progress, null, array('class' => 'form-extras'))!!}      
                  <br><br>
                  

                  </div>

          
                  {!! Form::submit('Add Task',['class'=>'btn-primary-action form-control','data-toggle' => 'tooltip']) !!}
           

            

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
