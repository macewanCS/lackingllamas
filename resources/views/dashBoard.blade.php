@extends('layouts.app')

@section('content')
    {!! Html::style('css/dashboard.css') !!}
    <div class="container-dashboard">
        <!--TODO work on dashboard -->
        <div class="welcomeTable">
            <h2>Welcome, {{ Auth::user()->name }}</h2>
            <div class="welcomeDescription">
            </div>
        </div>
        <div class="inner">
            <div class="notificationsTable">
                <div class="notifications-inner">

                    <ul>
                        <li> <div class="notificationDate">A day ago </div>
                                <a class="notificationsUser" href="#">Vicky Varga</a> commented on action <a href="#" class="notificationsItem">Support Team and Department projects</a>
                        </li>
                        <li> <div class="notificationDate">A day ago </div>
                            <a class="notificationsUser" href="#">Vicky Varga</a> commented on task <a  href="#" class="notificationsItem">Support CMA's roll out of EDI with Midwest Tapes</a>
                        </li>
                        <li> <div class="notificationDate">A day ago </div>
                            <a class="notificationsUser" href="#">Vicky Varga</a> edited action <a href="#" class="notificationsItem" >Support CMA's roll out of EDI with Midwest Tapes</a>
                        </li>
                        <li> <div class="notificationDate">A day ago </div>
                            <a class="notificationsUser" href="#">Vicky Varga</a> commented on task <a href="#" class="notificationsItem">Support Team and Department projects</a>
                        </li>
                        <li> <div class="notificationDate">A day ago </div>
                            <a class="notificationsUser" href="#">Vicky Varga</a> commented on task <a href="#" class="notificationsItem">Support Team and Department projects</a>
                        </li>
                        <li> <div class="notificationDate">A day ago </div>
                            <a class="notificationsUser" href="#">Vicky Varga</a> edited action <a href="#" class="notificationsItem">Support FIN's 2016 PCI compliance work by developing and implementing required network changes and documentation</a>
                        </li>
                        <li> <div class="notificationDate">A day ago </div>
                            <a class="notificationsUser" href="#">Vicky Varga</a> commented on action <a href="#" class="notificationsItem">Support Team and Department projects</a>
                        </li>
                        <li> <div class="notificationDate">A day ago </div>
                            <a class="notificationsUser" href="#">Vicky Varga</a> commented on task <a  href="#" class="notificationsItem">Support CMA's roll out of EDI with Midwest Tapes</a>
                        </li>
                        <li> <div class="notificationDate">A day ago </div>
                            <a class="notificationsUser" href="#">Vicky Varga</a> edited action <a href="#" class="notificationsItem" >Support CMA's roll out of EDI with Midwest Tapes</a>
                        </li>

                    </ul>
                </div>
                <button class="moreBtn">
                    <div class="moreBtn-inner">
                        More
                    </div>
                </button>
            </div>
        </div>
            <div class="tasksTable">
                <div class = "tasks-inner">
                    <h2>My Tasks</h2>
                    <ul>
                        @foreach($tasks as $task)
                            <li>
                                <div class="taskDescription">{{$task->description}}</div>
                                <div class="taskDate">{{ \Carbon\Carbon::parse($task->date)->diffForHumans()}}</div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tasksBtn"><a href="{{ url('/mytasks') }}">View All</a></div>
                </div>


            </div>




    </div>


@stop