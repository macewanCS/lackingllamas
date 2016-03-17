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
<nav class="navbar navbar-default">
    <div class="container-topbar">


        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src ="http://d34rompce3lx70.cloudfront.net/wp-content/uploads/sites/18/2015/11/DesktopLogo_190x105.png?v=1455821533145582093014558209303">
                <!-- TODO move EPL Logo to here. -->
            </a>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <button class="dropbtn">
                        Login
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    </div>
                @else
                    <button class="dropbtn">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ url('/myprofile') }}"><i class="fa fa-btn fa-my-profile"></i>My Profile</a>
                        <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                    </div>

                @endif
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Left Side Of Navbar -->

            <ul class="nav navbar-nav">
                @if (Auth::guest())
                    @if (Request::path() == 'home')
                        <li><div class="navbar-current"><a href="{{ url('/home') }}">Home</a></div></li>
                    @else
                        <li><div class="navbar-text"><a href="{{ url('/home') }}">Home</a></div></li>
                    @endif

                    @if (Request::path() == 'businessplan')
                        <li><div class="navbar-current"><a href="{{ url('/businessplan') }}">Business Plan</a></div></li>
                    @else
                        <li><div class="navbar-text"><a href="{{ url('/businessplan') }}">Business Plan</a></div></li>
                    @endif

                    @if (Request::path() == 'teams')
                        <li><div class="navbar-current"><a href="{{ url('/teams') }}">Groups</a></div></li>
                    @else
                        <li><div class="navbar-text"><a href="{{ url('/teams') }}">Groups</a></div></li>
                    @endif

                @else
                    @if (Request::path() == 'dashboard')
                        <li><div class="navbar-current"><a href="{{ url('/dashboard') }}">Dashboard</a></div></li>
                    @else
                        <li><div class="navbar-text"><a href="{{ url('/dashboard') }}">Dashboard</a></div></li>
                    @endif

                    @if (Request::path() == 'mytasks')
                        <li><div class="navbar-current"><a href="{{ url('/mytasks') }}">My Tasks</a></div></li>
                    @else
                        <li><div class="navbar-text"><a href="{{ url('/mytasks') }}">My Tasks</a></div></li>
                    @endif

                    @if (Request::path() == 'businessplan')
                        <li><div class="navbar-current"><a href="{{ url('/businessplan') }}">Business Plan</a></div></li>
                    @else
                        <li><div class="navbar-text"><a href="{{ url('/businessplan') }}">Business Plan</a></div></li>
                    @endif

                    @if (Request::path() == 'teams')
                        <li><div class="navbar-current"><a href="{{ url('/teams') }}">Groups</a></div></li>
                    @else
                        <li><div class="navbar-text"><a href="{{ url('/teams') }}">Groups</a></div></li>
                    @endif
                @endif

            </ul>

        </div>
    </div>
</nav>

@yield('content')

        <!-- JavaScripts -->
@yield('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
