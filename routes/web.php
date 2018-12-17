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
//    $timecode = DB::connection('otl')
//        ->table('Emp_Master')
//        ->where('Emp_Name' ,  'like','%Muhyadin%')
//        ->get();
//    return $timecode;
//    $employees = \App\Models\Employee::all();
//    foreach ($employees as $emp) {
//
//        $timecode = DB::connection('otl')->table('Emp_Master')->where('Emp_name', 'like',  $emp->name )->first();
////        dd($timecode);
//        if ($timecode) {
//            $emp->update([
//                'biometric_code' => $timecode->Emp_Id
//            ]);
//        }
//    }
//    dd('done');
//    return $employees->toArray();
//    $dep = DB::connection('contract')->table('EmployeeType')->select('*')->get();
//    foreach ($dep as $d) {
//        App\Models\EmployeeType::create([
//            'name' => $d->EmpType_Name
//        ]);
//    };
//    dd('done');

//    if ($employees) {
//        foreach ($employees as $e) {
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
//            $em->telephone()->create([
//                'telephone' => $e->Emp_MobileNo
//            ]);
//
//            if ($e->Emp_Deleted == 1) {
//                $em->delete();
//            }
//
//
//        }
//    }
//});
////
//////            $employeeColumn['name'] = $e->Emp_Name;
//////            $employeeColumn['staff_no'] = $e->Emp_StaffNo;
//////            $employeeColumn['national_id_no'] = $e->Emp_IDNo;
//////            $employeeColumn['kra_pin'] = $e->Emp_PinNo;
//////            $employeeColumn['nssf_no'] = $e->Emp_NSSFNo;
//////            $employeeColumn['nhif_no'] = $e->Emp_NHIFNo;
//////            $employeeColumn['bank_account_no'] = $e->Emp_BankAccountNo;
//////            $employeeColumn['gender'] = $e->Emp_Gender;
//////            $employeeColumn['dob'] = $e->Emp_DOB;
//////            $employeeColumn['physical_address'] = $e->Emp_PhysicalAddress;
//////            $employeeColumn['date_employed'] = $e->Emp_Date;
////////            $employeeColumn['marital_status'] = $e->marital_status;
////////            $employeeColumn['reports_to_id'] = $e->Emp_ReportsToID;
//////            $employeeColumn['bank_id'] = $e->Emp_BankID;
//////            $employeeColumn['employee_type_id'] = $e->Emp_Type;
////
////        }
//////        $I = \App\Models\Employee::where('national_id_no', $e->Emp_IDNo)->first();
////
//////         \App\Models\Employee::create([
//////             'name' => $employeeColumn['name'],
//////             'staff_no' => $employeeColumn['staff_no'],
//////             'national_id_no' => $employeeColumn['national_id_no'],
//////             'kra_pin' => $employeeColumn['kra_pin'],
//////             'nssf_no' => $employeeColumn['nssf_no'],
//////             'nhif_no' => $employeeColumn['nhif_no'],
//////             'bank_account_no' => $employeeColumn['bank_account_no'],
//////             'gender' => $employeeColumn['gender'],
//////             'dob' => $employeeColumn['dob'],
//////             'physical_address' => $employeeColumn['physical_address'],
//////             'date_employed' => $employeeColumn['date_employed'],
//////         ]);
////
//        }
//    }
//});
    return redirect()->route('login');
});
Auth::routes();

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
    Route::get('/events/{id}/comments', 'Frontend\EventsController@getComments')->name('frontend.events.getComments'); // TODO: create dedicated API route

    Route::get('/news', 'Frontend\NewsController@index')->name('frontend.news.index');
    Route::get('/news/{id}/comments', 'Frontend\NewsController@getComments')->name('frontend.news.getComments'); // TODO: create dedicated API route
    Route::get('/news/{id}', 'Frontend\NewsController@show')->name('frontend.news.show');
    Route::post('/news/{id}', 'Frontend\NewsController@comment')->name('frontend.news.comment');

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

    Route::get('employees/search/{national_id_no}', 'EmployeesController@search');
    Route::post('employees/searchBiometric', 'UsersController@searchBiometricCode')->name('employee.search-biometric-code');

    Route::patch('/comments/{id}', 'CommentsController@update')->name('news.comment.update');
    Route::delete('/comments/{id}', 'CommentsController@destroy')->name('news.comment.destroy');

    Route::resource('users', 'UsersController');
    Route::resource('employees', 'EmployeesController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('news', 'NewsController');
    Route::resource('events', 'EventsController');
    Route::resource('employee-type', 'EmployeeTypesController');
    Route::resource('biometric-in-out', 'BiometricInOutDetailsController');
});

