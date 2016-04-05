<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EPL Business Plan Manager</title>
    @yield('endHead')
</head>
<body id="app-layout">
<!-- Styles -->
{!! Html::style('css/style.css') !!}
{!! Html::style('css/font-awesome.min.css') !!}
<nav class="topbar topbar-default">
    <div class="container-topbar">




        <div class="collapse topbar-collapse" id="app-topbar-collapse">

            <!-- Left Side Of topbar -->

            <ul class="nav topbar-nav">
                <!-- Branding Image -->
                <li><div class="topbar-text"><a href="{{ url('/businessplan',App\BusinessPlan::orderBy('created', 'desc')->first()->id) }}">{{HTML::image('pictures/EPL.png',null, ['class' => 'topbar-img'])}}
                        </a></div></li>

                @if (strpos(Request::path(),'businessplan') !== FALSE)

                    <li><div class="topbar-current"><a href="{{ url('/businessplan',App\BusinessPlan::orderBy('created', 'desc')->first()->id)}}">Business Plan</a></div></li>
                @else
                    <li><div class="topbar-text"><a href="{{  url('/businessplan',App\BusinessPlan::orderBy('created', 'desc')->first()->id) }}">Business Plan</a></div></li>
                @endif

                @if (Request::path() == 'groups')
                    <li><div class="topbar-current"><a href="{{ url('/groups') }}">Groups</a></div></li>
                @else
                    <li><div class="topbar-text"><a href="{{ url('/groups') }}">Groups</a></div></li>
                @endif


            </ul>
        </div>
        <!-- Right Side Of topbar -->
            <span class="nav topbar-nav topbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <button class="dropbtn">
                        Login
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ url('/login') }}">Login</a>
                    </div>
                @else
                    <button class="dropbtn">
                        {{ Auth::user()->name }} <span class="fa fa-caret-down"></span>
                    </button>
                    <div class="dropdown-content">
                        <a href="{{url('/businessplan/' . App\BusinessPlan::orderBy('created', 'desc')->first()->id) . '/user/' . Auth::id()}}"><i class="fa fa-btn fa-my-tasks"></i>My Tasks</a> <!-- TODO: Link to business plan filtered with my tasks -->
                        <a href="{{url('/user/' . Auth::id())}}"> My Profile</a>
                        <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                    </div>

                @endif
                </span>
    </div>
</nav>

@yield('content')

        <!-- JavaScripts -->
{!! Html::script('javascript/jquery-2.0.3.min.js') !!}
@yield('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
