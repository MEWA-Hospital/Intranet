<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

Route::get('/gh', function () {
    return 'gh';
});
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

    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{username}', 'ProfileController@index')
    ->name('profile.index');

Route::post('/profile/{username}/picture', 'ProfileController@storeProfilePicture')
    ->name('profile.storePicture');

Route::get('/getDepartments', 'Auth\RegisterController@getDepartments')
    ->name('getDepartments');

Route::post('/accountRequest', 'Auth\RegisterController@handleAccountRequest')
    ->name('account.request');

Route::get('/profile/{username}/notifications', 'ProfileController@notifications')
    ->name('notifications');

Route::delete('/profile/{username}/notifications/{id}', 'ProfileController@markNotificationAsRead')
    ->name('notifications.read');


Route::group([
    'prefix'     => 'f',
    'middleware' => 'auth'
], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('home');
    Route::post('/change_password/{id}', 'ProfileController@changePassword')->name('change.password');
    Route::get('/events', 'Frontend\EventsController@index')->name('frontend.events.index');
    Route::get('/events/create', 'Frontend\EventsController@create')->name('frontend.events.create');
    Route::post('/events', 'Frontend\EventsController@store')->name('frontend.events.store');
    Route::get('/events/{id}', 'Frontend\EventsController@show')->name('frontend.events.show');
    Route::get('/departments', 'Frontend\DepartmentsController@index')->name('frontend.departments.index');
    Route::get('/departments/{id}', 'Frontend\DepartmentsController@show')->name('frontend.departments.show');
    Route::post('/events/{id}', 'Frontend\EventsController@storeComment')->name('frontend.events.comment');
    Route::get('/events/{id}/comments',
        'Frontend\EventsController@getComments')
        ->name('frontend.events.getComments'); // TODO: create dedicated API route

    Route::patch('/comment/{id}', 'Frontend\EventsController@updateComment')
        ->name('frontend.update-comment');
    Route::delete('/comment/{id}', 'Frontend\EventsController@deleteComment')
        ->name('frontend.delete-comment');

    Route::get('/news', 'Frontend\NewsController@index')->name('frontend.news.index');

    Route::get('/news/{id}/comments',
        'Frontend\NewsController@getComments')->name('frontend.news.getComments'); // TODO: create dedicated API route

    Route::get('/news/{id}', 'Frontend\NewsController@show')->name('frontend.news.show');

    Route::post('/news/{id}', 'Frontend\NewsController@comment')->name('frontend.news.comment');

    Route::get('/people', 'Frontend\PeopleController@index')->name('frontend.people.index');

    Route::get('/people/datatable', 'Frontend\PeopleController@dataTable')->name('frontend.people.datatable');

    Route::get('upcomingEvents/datatable', [
        'middleware' => ['auth'],
        'uses'       => 'HomeController@upcomingEventsDataTable'
    ])->name('upcomingEvents.datatable');


    Route::get('/biometric-in-out/{id}', 'BiometricInOutDetailsController@show')
        ->name('frontend.biometric-user-data');

    Route::get('/download-document/{document}', 'HomeController@downloadDocument')
        ->name('frontend.download.document');

    Route::get('/documents', 'Frontend\DocumentController@index')->name('frontend.documents.index');

    Route::get('/documents/get-documents', 'Frontend\DocumentController@getDocuments')
        ->name('frontend.documents.fetch');

    Route::get('/document/{uuid}', 'Frontend\DocumentController@download')
        ->name('frontend.documents.download');

    Route::delete('/document/delete/{uuid}', 'Frontend\DocumentController@destroy')
        ->name('frontend.documents.destroy');

    Route::post('/documents/upload', 'Frontend\DocumentController@store')
        ->name('frontend.documents.store');


});

Route::group([
    'as'     => 'admin.',
//    'middleware' => ['auth', 'role:superadmin|admin'],
    'prefix' => 'admin'
], function () {

    Route::get('/department/{id}/documents', [
        'middleware' => ['permission:read-departments'],
        'uses'       => 'DepartmentsController@getDepartmentDocuments'
    ])->name('department.retrieve-documents');


    Route::post('users/activate', [
        'middleware' => ['permission:create-users'],
        'uses'       => 'UsersController@activateUser'
    ])->name('users.activate');

    Route::get('users/activate/{id}', [
        'middleware' => ['permission:create-users'],
        'uses'       => 'UsersController@showActivateForm'
    ])->name('users.show-activate-form');


    /*
    |--------------------------------------------------------------------------
    | DATATABLE ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('users/datatable', [
//        'middleware' => ['permission:read-users'],
        'uses' => 'UsersController@dataTable'
    ])->name('users.datatable');

    Route::get('departments/datatable', [
        'middleware' => ['permission:read-departments'],
        'uses'       => 'DepartmentsController@dataTable'
    ])->name('departments.datatable');


    Route::get('documents/datatable', [
        'middleware' => ['permission:read-departments'],
        'uses'       => 'DocumentsController@dataTable'
    ])->name('documents.datatable');


    Route::get('employees/datatable', [
        'middleware' => ['permission:read-employees'],
        'uses'       => 'EmployeesController@dataTable'
    ])->name('employees.datatable');

    Route::get('news/datatable', [
//        'middleware' => ['permission:read-news'],
        'uses'       => 'NewsController@dataTable'
    ])->name('news.datatable');

    Route::get('events/datatable', [
        'middleware' => ['permission:read-events'],
        'uses'       => 'EventsController@dataTable'
    ])->name('events.datatable');

    Route::get('memos/datatable', [
        'middleware' => ['permission:read-memo'],
        'uses'       => 'MemosController@dataTable'
    ])->name('memos.datatable');

    Route::get('extensions/datatable', [
        'middleware' => ['permission:read-extensions'],
        'uses'       => 'ExtensionsController@dataTable'
    ])->name('extensions.datatable');

    Route::get('employees/datatable', [
        'middleware' => ['permission:read-employees'],
        'uses'       => 'EmployeesController@dataTable'
    ])->name('employees.datatable');


    Route::patch('/departments/update-details/{id}', 'DepartmentsController@updateDetails');
    Route::patch('/departments/update-overview/{id}', 'DepartmentsController@updateOverview');

    Route::post('/department/process-document', [
        'middleware' => ['permission:create-departments'],
        'uses'       => 'DepartmentsController@processUploadedDocuments'
    ])->name('department.process-documents');

    Route::get('/department/{id}/documents', [
        'middleware' => ['permission:read-departments'],
        'uses'       => 'DepartmentsController@getDepartmentDocuments'
    ])->name('departments.retrieve-documents');

    Route::get('employees/search/{national_id_no}', [
        'middleware' => ['permission:create-employees'],
        'uses'       => 'EmployeesController@search'
    ]);

    Route::post('employees/searchBiometric', [
        'middleware' => ['permission:create-employees'],
        'uses'       => 'UsersController@searchBiometricCode'
    ])->name('employee.search-biometric-code');

    Route::patch('/comments/{id}', 'CommentsController@update')
        ->name('news.comment.update');

    Route::delete('/comments/{id}', 'CommentsController@destroy')
        ->name('news.comment.destroy');

    Route::resource('employees', 'EmployeesController', [
        'middleware' => ['permission:read-employees|create-employees|update-employees|delete-employees, require_all']
    ]);

    Route::resource('departments', 'DepartmentsController', [
        'middleware' => ['permission:read-departments|create-departments|update-departments|delete-departments, require_all']
    ]);

    Route::resource('news', 'NewsController', [
//        'middleware' => ['permission:read-news|create-news|update-news|delete-news, require_all']
    ]);

    Route::resource('events', 'EventsController', [
        'middleware' => ['permission:read-events|create-events|update-events|delete-events, require_all']
    ]);

    Route::resource('employee-type', 'EmployeeTypesController', [
        'middleware' => ['permission:read-employee-type|create-employee-type|update-employee-type|delete-employee-type, require_all']
    ]);

    Route::resource('biometric-in-out', 'BiometricInOutDetailsController', [
        'middleware' => ['permission:read-users|create-users|update-users|delete-users, require_all']
    ]);

    Route::resource('memos', 'MemosController', [
        'middleware' => ['permission:read-memo|create-memo|update-memo|delete-memo, require_all']
    ]);

    Route::resource('extensions', 'ExtensionsController', [
        'middleware' => ['permission:read-users|create-users|update-users|delete-users, require_all']
    ]);

    Route::resource('minutes', 'MinutesController', [
//        'middleware' => ['permission:read-minutes|create-minutes|update-minutes|delete-minutes, require_all']
    ]);


    Route::resource('users', 'UsersController');
    Route::resource('documents', 'DocumentsController');


});

Route::get('/api/users', 'Api\UsersController@index');
Route::get('/p', function () {
    return view('Mail.payroll.payroll');
});

