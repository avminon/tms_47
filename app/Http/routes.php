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
        });

        Route::group(['namespace' => 'Trainee'], function () {
            Route::resource('trainee/courses', 'CourseController', ['only' => ['index', 'show']]);
        });
    });
});
