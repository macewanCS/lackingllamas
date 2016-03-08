@extends('layouts.app')
{!! Html::style('css/home.css') !!}

@section('content')
<div class="container-home">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading-home">Home</div>

                <div class="panel-body-home">
                    You are not logged in
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
