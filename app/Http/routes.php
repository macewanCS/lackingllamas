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
    Route::get('businessplan','BusinessPlanController@lastBP');
    Route::get('businessplan/{idbp}','BusinessPlanController@businessPlan');
    //---------------------------
    //create goat routes
    Route::get('test','BusinessPlanController@test');
    Route::get('businessplan/{idbp}/createbp','BusinessPlanController@createBP');
    Route::get('businessplan/{idbp}/creategoal','BusinessPlanController@createGoal');
    Route::get('businessplan/{idbp}/createobjective','BusinessPlanController@createObjective');
    Route::get('businessplan/{idbp}/createaction','BusinessPlanController@createAction');
    Route::get('businessplan/{idbp}/createtask','BusinessPlanController@createTask');
    Route::post('businessplan/{idbp}','BusinessPlanController@store');

    Route::get('businessplan/{idbp}/{id}/edit/bp','BusinessPlanController@editBP');
    Route::get('businessplan/{idbp}/{id}/edit/Goal','BusinessPlanController@editGoal');
    Route::get('businessplan/{idbp}/{id}/edit/Objective','BusinessPlanController@editObjective'); 
    Route::get('businessplan/{idbp}/{id}/edit/Action','BusinessPlanController@editAction');
    Route::get('businessplan/{idbp}/{id}/edit/Task','BusinessPlanController@editTask');
    Route::put('businessplan/{idbp}/{id}','BusinessPlanController@update');
    Route::patch('businessplan/{idbp}/{id}','BusinessPlanController@update');

    Route::post('businessplan/{idbp}/{id}/delete/Goal', 'BusinessPlanController@deleteGoal');
    Route::post('businessplan/{idbp}/{id}/delete/Objective', 'BusinessPlanController@deleteObjective');
    Route::post('businessplan/{idbp}/{id}/delete/Action', 'BusinessPlanController@deleteAction');
    Route::post('businessplan/{idbp}/{id}/delete/Task', 'BusinessPlanController@deleteTask');
    //Route::resource('businessplan','BusinessPlanController');
    //----------------------------
    Route::get('myprofile','MyProfileController@myProfile');
    //Task Comment Routes
    Route::get('task/{id}', 'TaskCommentsController@taskComments');
    Route::post('task/{id}', 'TaskCommentsController@store');
    Route::get('task/{id}/edit', 'TaskCommentsController@editTaskFromComments');
    Route::patch('task/{id}', 'TaskCommentsController@updateTask');

    //Action Comment Routes
    Route::get('action/{id}', 'ActionCommentsController@actionComments');
    Route::post('action/{id}', 'ActionCommentsController@store');
    Route::get('action/{id}/edit', 'ActionCommentsController@editActionFromComments');
    Route::patch('action/{id}', 'ActionCommentsController@updateAction');

    //Group Routes
    Route::get('groups', 'GroupController@groups');
});


