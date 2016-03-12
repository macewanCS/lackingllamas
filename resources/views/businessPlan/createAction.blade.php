
@extends('layouts.app')

@section('content')

      {!! Html::style('css/createGoal.css') !!}
      <div class="create-goal-container">
            <div class="create-goal-inner">
            <h2>
                  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
                  Create a Action
            </h2>


            
            {!! Form::open(['url'=>'businessplan']) !!}

            <div class="form-group-one">
                  {!! Form::label('objective_id','Objective: ') !!}
                  {!! Form::select('objective_id',$objectives)!!}

                
                  {!! Form::label('description','Name: ') !!}
                  {!! Form::text('description') !!}

                  {!! Form::label('date','date: ') !!}
                  {!! Form::text('date', '', array('id' => 'datepicker')) !!}

                  {!! Form::label('leads','Leads: ') !!}
                  {!! Form::text('leads') !!}

                  {!! Form::label('collaborators','Collaborators: ') !!}
                  {!! Form::text('collaborators') !!}

                  {!! Form::label('budget','budget: ') !!}
                  {!! Form::text('budget') !!}       
                           
                  {!! Form::label('projectPlanprojectPlan','projectPlan: ') !!}
                  {!! Form::text('projectPlan') !!}  

                  {!! Form::label('successMeasured','successMeasured: ') !!}
                  {!! Form::text('successMeasured') !!} 

                  {!! Form::label('priority','priority: ') !!}
                  {!! Form::text('priority') !!} 
            </div>

            <div class="form-group-two">
                  {!! Form::submit('Add Action',['class'=>'btn-primary form-control','data-toggle' => 'tooltip']) !!}
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
