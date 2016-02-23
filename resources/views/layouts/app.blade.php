<!doctype html>
<html lang="en">

<meta charset="UTF-8">
<meta name="CMPT395 Project", content="">
<meta name="lackingllamas", content="">

<title>Document</title> <!-- TODO change the title -->
<link rel="stylesheet" href="#"> <!-- TODO add reference to stylesheet. -->
<body>

    <div class="navbar">
        <div class="navbar-inner">
            <a id="logo" href="/"></a> <!-- TODO need reference to EPL logo, and where does clicking the logo take us? -->
            <ul>
                <li><a href="/dashBoard">DashBoard</a></li>
                <li><a href="/myTasks">My Tasks</a></li>
                <li><a href="/businessPlan">Business Plan</a></li>
                <li><a href="/teams">Teams</a></li>
                <li><a href="/departments">Departments</a></li>
                <li><a href="/notifications">Notifications</a></li>
                <li><a href="/myProfile">My Profile</a></li>
            </ul>
        </div>
        <!-- TODO add login button -->
    </div>
    <div class="container">
        @yield('content') <!-- This is where the content goes for every other page -->
    </div>

</body>
</html>