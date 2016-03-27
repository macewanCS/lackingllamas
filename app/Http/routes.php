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
    Route::get('/', 'LoginController@login');
    //Route::get('dashboard', 'DashboardController@dashBoard');
    Route::get('mytasks','MyTasksController@myTasks');
    Route::get('businessplan','BusinessPlanController@businessPlan');
    //---------------------------
    //create goat routes
    Route::get('businessplan/createbp','BusinessPlanController@createBP');
    Route::get('businessplan/creategoal','BusinessPlanController@createGoal');
    Route::get('businessplan/createobjective','BusinessPlanController@createObjective');
    Route::get('businessplan/createaction','BusinessPlanController@createAction');
    Route::get('businessplan/createtask','BusinessPlanController@createTask');
    Route::post('businessplan','BusinessPlanController@store');
    Route::get('businessplan/{id}/edit/bp','BusinessPlanController@editBP');
    Route::get('businessplan/{id}/edit/Goal','BusinessPlanController@editGoal');
    Route::get('businessplan/{id}/edit/Objective','BusinessPlanController@editObjective'); 
    Route::get('businessplan/{id}/edit/Action','BusinessPlanController@editAction');
    Route::get('businessplan/{id}/edit/Task','BusinessPlanController@editTask');
    Route::put('businessplan/{id}','BusinessPlanController@update');
    Route::patch('businessplan/{id}','BusinessPlanController@update');
    //Route::resource('businessplan','BusinessPlanController');
    //----------------------------
    Route::get('myprofile','MyProfileController@myProfile');
    //Task Comment Routes
    Route::get('task/{id}', 'TaskCommentsController@taskComments');
    Route::post('task/{id}', 'TaskCommentsController@store');
    //Route::get('task/{id}/edit', 'BusinessPlanController@editTaskFromComments');

    //Action Comment Routes
    Route::get('action/{id}', 'ActionCommentsController@actionComments');
    Route::post('action/{id}', 'ActionCommentsController@store');
    Route::get('action/{id}/edit', 'ActionCommentsController@editActionFromComments');
    Route::patch('action/{id}', 'ActionCommentsController@updateAction');
});


