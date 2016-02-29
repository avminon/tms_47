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
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::resourceParameters([
            'users' => 'user',
            'subjects' => 'subject',
            'tasks' => 'task',
            'courses' => 'course',
        ]);
        Route::group(['namespace' => 'Supervisor'], function () {
            Route::get('supervisor/home', 'HomeController@index');
            Route::resource('supervisor/courses', 'CourseController');
            Route::get('supervisor/courses/{course}/members',
                ['as' => 'supervisor.courses.members', 'uses' => 'CourseController@members'
            ]);
            Route::post(
                'supervisor/courses/{course}/addMember',
                ['as' => 'supervisor.courses.addMember', 'uses' => 'CourseController@addMember']
            );
            Route::delete(
                'supervisor/courses/{user}/deleteMember',
                ['as' => 'supervisor.courses.deleteMember', 'uses' => 'CourseController@deleteMember']
            );
            Route::resource('supervisor/tasks', 'TaskController');
            Route::get('supervisor/users/{user}/activities', [
                'as' => 'supervisor.activities.list',
                'uses' => 'UserController@listActivities',
            ]);
            Route::resource('supervisor/subjects', 'SubjectController');
            Route::resource('supervisor/users', 'UserController');
        });

        Route::group(['namespace' => 'Trainee'], function () {
            Route::get('trainee/home', 'HomeController@index');
            Route::resource('trainee/courses', 'CourseController', ['only' => ['index', 'show']]);
            Route::get('trainee/courses/{course}/members',
                ['as' => 'trainee.courses.members', 'uses' => 'CourseController@members'
            ]);
            Route::resource('trainee/subjects', 'SubjectController', ['only' => ['index', 'show']]);
            Route::resource('trainee/users', 'UserController');
            Route::get('trainee/users/{user}/activities', [
                'as' => 'trainee.activities.list',
                'uses' => 'UserController@listActivities',
            ]);
            Route::match(
                ['put', 'post'],
                'trainee/user-tasks/',
                ['as' => 'trainee.user-tasks.batchUpdate', 'uses' => 'UserTaskController@batchUpdate']
            );
            Route::resource('trainee/tasks', 'TaskController', ['only' => ['index', 'show', 'update']]);

        });
    });
});
