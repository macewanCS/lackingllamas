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
/*
|--------------------------
| TOP BAR ROUTES
|--------------------------
 */


Route::get('dashboard', 'DashboardController@dashBoard');
Route::get('mytasks','MyTasksController@myTasks');
Route::get('businessplan','BusinessPlanController@businessPlan');
Route::get('teams','TeamsController@teams');
Route::get('departments','DepartmentsController@departments');
Route::get('notifications','NotificationsController@notifications');
Route::get('myprofile','MyProfileController@myProfile');


/*
|--------------------------
| TOP BAR ROUTES END
|--------------------------
 */


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


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
