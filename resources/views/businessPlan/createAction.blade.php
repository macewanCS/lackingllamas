
@extends('layouts.app')

@section('content')

      {!! Html::style('css/createGoal.css') !!}
      <div class="create-action-container">
            <div class="create-goal-inner">
            <h2>
                  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
                  Create a Action
            </h2>


            
            {!! Form::open(['url'=>'businessplan']) !!}

            <div class="form-group-one">

                  {!! Form::label('objective_id','Objective: ') !!}<br>
                  {!! Form::select('objective_id',$objectives,null, array('class' => 'form-control'))!!}<br>

                
                  {!! Form::label('description','Name: ') !!}<br>
                  {!! Form::text('description') !!}<br>

                  {!! Form::label('date','date: ') !!}<br>
                  {!! Form::input('date','date', date('Y-m-d'), ['class' => 'form-control']) !!}<br>

                  {!! Form::label('leads','Leads: ') !!}<br>
                  {!! Form::text('leads') !!}<br>

                  {!! Form::label('collaborators','Collaborators: ') !!}<br>
                  {!! Form::text('collaborators') !!}<br>

                  {!! Form::label('budget','budget: ') !!}<br>
                  {!! Form::text('budget') !!}       <br>
                           
                  {!! Form::label('projectPlanprojectPlan','projectPlan: ') !!}<br>
                  {!! Form::text('projectPlan') !!}  <br>

                  {!! Form::label('successMeasured','successMeasured: ') !!}<br>
                  {!! Form::text('successMeasured') !!} <br>

                  {!! Form::label('priority','priority: ') !!}<br>
                  {!! Form::text('priority') !!} <br>
                  {!! Form::hidden('teamOrDeptId', 1) !!}
                  <div id ="test">
                    {!! Form::label('bp','BusinessPlan: ') !!}
                    {!! Form::checkbox('bp', 1, true) !!}
                    <p class="divBP">Part of Business Plan? Checked means yes</p>
                  </div>
                  </div>

          
                  {!! Form::submit('Add Action',['class'=>'btn-primary-action form-control','data-toggle' => 'tooltip']) !!}
           

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
