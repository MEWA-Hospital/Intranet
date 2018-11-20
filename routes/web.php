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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group([
    'prefix'     => 'frontend',
    'middleware' => 'auth'
], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('home');
    Route::get('/news', 'Frontend\NewsController@index')->name('frontend.news.index');
    Route::get('/news/{id}/comments', 'Frontend\NewsController@getComments')->name('frontend.news.getComments'); // TODO: create dedicated API route
    Route::get('/news/{id}', 'Frontend\NewsController@show')->name('frontend.news.show');
    Route::post('/news/{id}', 'Frontend\NewsController@comment')->name('frontend.news.comment');

});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('users/datatable', 'UsersController@dataTable')->name('users.datatable');
    Route::get('departments/datatable', 'DepartmentsController@dataTable')->name('departments.datatable');
    Route::get('news/datatable', 'NewsController@dataTable')->name('news.datatable');
    Route::get('events/datatable', 'EventsController@dataTable')->name('events.datatable');


    Route::patch('/comments/{id}', 'CommentsController@update')->name('news.comment.update');
    Route::delete('/comments/{id}', 'CommentsController@destroy')->name('news.comment.destroy');

    Route::resource('users', 'UsersController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('news', 'NewsController');
    Route::resource('events', 'EventsController');
});

