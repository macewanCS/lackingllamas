<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EPL Business Plan Manager</title>








</head>
<body id="app-layout">
<!-- Styles -->
{!! Html::style('css/style.css') !!}
<nav class="navbar navbar-default">
    <div class="container">


        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <!-- TODO move EPL Logo to here. -->
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <img src ="http://d34rompce3lx70.cloudfront.net/wp-content/uploads/sites/18/2015/11/DesktopLogo_190x105.png?v=1455821533145582093014558209303">
                <li><div class ="navbar-text"><a href="{{ url('/dashboard') }}">Home</a></div></li>
                <li><div class ="navbar-text"><a href="{{ url('/mytasks') }}">My Tasks</a></div></li>
                <li><div class ="navbar-text"><a href="{{ url('/businessplan') }}">Business Plan</a></div></li>
                <li><div class ="navbar-text"><a href="{{ url('/teams') }}">Teams</a></div></li>
                <li><div class ="navbar-text"><a href="{{ url('/departments') }}">Departments</a></div></li>
                <li><div class ="navbar-text"><a href="{{ url('/notifications') }}">Notifications</a></div></li>
                <li><div class ="navbar-text"><a href="{{ url('/myprofile') }}">My Profile</a></div></li>

            </ul>

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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

        <!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
