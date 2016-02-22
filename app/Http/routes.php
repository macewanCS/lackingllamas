<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//--------------------------
//TOP BAR ROUTES
//--------------------------

Route::get('home', 'TopBarController@home');
Route::get('myTasks','TopBarController@myTasks');
Route::get('businessPlan','TopBarController@businessPlan');
Route::get('teams','TopBarController@teams');
Route::get('departments','TopBarController@departments');
Route::get('notifications','TopBarController@notifications');
Route::get('myProfile','TopBarController@myProfile');


//--------------------------
//TOP BAR ROUTES END
//--------------------------


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
