<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/h', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group([
    'prefix' => 'frontend',
//    'middleware' => 'auth'
], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('home');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('users/datatable', 'UsersController@dataTable')->name('users.datatable');
    Route::get('departments/datatable', 'DepartmentsController@dataTable')->name('departments.datatable');
    Route::get('news/datatable', 'NewsController@dataTable')->name('news.datatable');
    Route::get('events/datatable', 'EventsController@dataTable')->name('events.datatable');

    Route::resource('users', 'UsersController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('news', 'NewsController');
    Route::resource('events', 'EventsController');
});

