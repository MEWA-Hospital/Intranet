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

    return redirect()->route('login');
});



//Route::get('/emp', function () {
//
//    $em = \DB::connection('locum')->table('Employees')->select('*')->get();
//
//    $active = $em->filter(function ($employee) {
//        return $employee->Emp_Inactive == 0 && $employee->Emp_DepartmentID != 'MEWA.75' && $employee->Emp_DepartmentID != 'MEWA.74' && $employee->Emp_SeparationID == null;
//    });
//
//    if ($active) {
//        foreach ($active as $e) {
//            $em = App\Models\Employee::create([
//                'name'             => $e->Emp_Name,
//                'designation'      => $e->Emp_Designation,
//                'staff_no'         => $e->Emp_StaffNo,
//                'national_id_no'   => $e->Emp_IDNo,
//                'kra_pin'          => $e->Emp_PinNo,
//                'nssf_no'          => $e->Emp_NSSFNo,
//                'nhif_no'          => $e->Emp_NHIFNo,
//                'bank_account_no'  => $e->Emp_BankAccountNo,
//                'gender'           => $e->Emp_Gender,
//                'dob'              => $e->Emp_DOB,
//                'physical_address' => $e->Emp_PhysicalAddress,
//                'date_employed'    => $e->Emp_Date,
//                'employee_type_id' => $e->Emp_Type
//            ]);
//
//            $em->telephone()->create([
//                'telephone' => $e->Emp_MobileNo
//            ]);
//            $em->email()->create([
//                'email' => $e->Emp_Email
//            ]);
//        }
//    }
//});


Auth::routes();

Route::get('/demo', function () {

    $html = \View::make('Backend.memos.mail_template')->render();
    Spatie\Browsershot\Browsershot::html($html)
        ->showBackground()
        ->margins(0, 0, 0, 0)
        ->save(storage_path('1.pdf'));
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index');
Route::post('/profile/{username}/picture', 'ProfileController@storeProfilePicture')->name('profile.storePicture');
Route::get('/getDepartments', 'Auth\RegisterController@getDepartments')->name('getDepartments');
Route::post('/accountRequest', 'Auth\RegisterController@handleAccountRequest')->name('account.request');


Route::group([
    'prefix'     => 'f',
    'middleware' => 'auth'
], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('home');
    Route::post('/change_password/{id}', 'ProfileController@changePassword')->name('change.password');
    Route::get('/events', 'Frontend\EventsController@index')->name('frontend.events.index');
    Route::get('/events/{id}', 'Frontend\EventsController@show')->name('frontend.events.show');
    Route::get('/departments', 'Frontend\DepartmentsController@index')->name('frontend.departments.index');
    Route::get('/departments/{id}', 'Frontend\DepartmentsController@show')->name('frontend.departments.show');
    Route::post('/events/{id}', 'Frontend\EventsController@comment')->name('frontend.events.comment');
    Route::get('/events/{id}/comments',
        'Frontend\EventsController@getComments')->name('frontend.events.getComments'); // TODO: create dedicated API route

    Route::get('/news', 'Frontend\NewsController@index')->name('frontend.news.index');
    Route::get('/news/{id}/comments',
        'Frontend\NewsController@getComments')->name('frontend.news.getComments'); // TODO: create dedicated API route
    Route::get('/news/{id}', 'Frontend\NewsController@show')->name('frontend.news.show');
    Route::post('/news/{id}', 'Frontend\NewsController@comment')->name('frontend.news.comment');
    Route::get('/people', 'Frontend\UsersController@index')->name('frontend.people.index');
    Route::get('/people/datatable', 'Frontend\UsersController@dataTable')->name('frontend.people.datatable');

});

Route::group([
    'as'         => 'admin.',
    'middleware' => 'auth',
    'prefix'     => 'admin'
], function () {
    Route::post('users/activate', 'UsersController@activateUser')->name('users.activate');
    Route::get('users/datatable', 'UsersController@dataTable')->name('users.datatable');
    Route::get('users/activate/{id}', 'UsersController@showActivateForm')->name('users.show-activate-form');
    Route::get('departments/datatable', 'DepartmentsController@dataTable')->name('departments.datatable');
    Route::get('news/datatable', 'NewsController@dataTable')->name('news.datatable');
    Route::get('events/datatable', 'EventsController@dataTable')->name('events.datatable');
    Route::get('memos/datatable', 'MemosController@dataTable')->name('memos.datatable');
    Route::get('extensions/datatable', 'ExtensionsController@dataTable')->name('extensions.datatable');

    Route::get('employees/search/{national_id_no}', 'EmployeesController@search');
    Route::post('employees/searchBiometric',
        'UsersController@searchBiometricCode')->name('employee.search-biometric-code');

    Route::patch('/comments/{id}', 'CommentsController@update')->name('news.comment.update');
    Route::delete('/comments/{id}', 'CommentsController@destroy')->name('news.comment.destroy');

    Route::resource('users', 'UsersController');
    Route::resource('employees', 'EmployeesController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('news', 'NewsController');
    Route::resource('events', 'EventsController');
    Route::resource('employee-type', 'EmployeeTypesController');
    Route::resource('biometric-in-out', 'BiometricInOutDetailsController');
    Route::resource('memos', 'MemosController');
    Route::resource('extensions', 'ExtensionsController');
});

