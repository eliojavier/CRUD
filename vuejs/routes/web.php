<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('vuejscrud', 'BlogController@vueCrud');
Route::resource('vueitems', 'BlogController');

Route::get('/', function () {
    $tasks=App\Task::latest()->get();
    return view('welcome', compact('tasks'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
