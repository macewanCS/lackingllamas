
<!-- Styles -->
{!! Html::style('css/style.css') !!}
{!! Html::style('css/login.css') !!}

<img class="top-image" src="https://cdn.yegishome.ca/places/4187/551cc0bd6623b-cover.png">
<div class="LoginRegister">
    <div class="panel panel-default">
        <!--<div class="panel-heading">Login</div>-->
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>Login
                        </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4 LoginRegister-link">
                        <a href="{{ url('/businessplan',App\BusinessPlan::orderBy('created', 'desc')->first()->id) }}">Read-Only Mode</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4 LoginRegister-link">
                        <a href="{{ url('/register') }}">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
