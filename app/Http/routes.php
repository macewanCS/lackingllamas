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


/*
|--------------------------
| TOP BAR ROUTES
|--------------------------
 */





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
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('dashboard', 'DashboardController@dashBoard');
    Route::get('mytasks','MyTasksController@myTasks');
    Route::get('businessplan','BusinessPlanController@businessPlan');
    Route::get('businessplan/creategoal','BusinessPlanController@createGoal');
    Route::post('businessplan','BusinessPlanController@storeGoal');
    Route::get('businessplan/createobjective','BusinessPlanController@createObjective');
    Route::post('businessplan','BusinessPlanController@storeObjective');

    Route::get('teams','TeamsController@teams');
    Route::get('departments','DepartmentsController@departments');

    Route::get('myprofile','MyProfileController@myProfile');
});


