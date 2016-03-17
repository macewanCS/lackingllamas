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
    //---------------------------
    //create goat routes
    Route::get('businessplan/creategoal','BusinessPlanController@createGoal');


    Route::get('businessplan/createobjective','BusinessPlanController@createObjective');


    Route::get('businessplan/createaction','BusinessPlanController@createAction');

    Route::get('businessplan/createtask','BusinessPlanController@createTask');
    Route::post('businessplan','BusinessPlanController@store');
    Route::get('businessplan/editgoal','BusinessPlanController@edit');

    //----------------------------
    Route::get('teams_departments','TeamsDepartmentsController@show');

    Route::get('myprofile','MyProfileController@myProfile');
});


