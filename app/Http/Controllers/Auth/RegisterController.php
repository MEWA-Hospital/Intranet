<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/f/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'  => 'required|string|max:50|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|string|unique:users|digits:10',
            'password'  => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create()
    {
        dd('Disabled!');

    }

    /**
     * Create a new user and associated records after a valid registration.
     *
     * @param Request $request
     * @return void
     * @throws \Throwable
     */
    protected function handleAccountRequest(Request $request)
    {
        $this->validate($request, [
            'username'       => 'required|string|max:50|unique:users',
            'email'          => 'required|string|email|max:255|unique:users|regex:/^[A-Za-z0-9\.]*@(mewa)[.](or)[.](ke)$/',
            'national_id_no' => 'required|string',
            'name'           => 'required|string|max:50',
            'password'       => 'required|string|min:6',
            'department_id'  => 'required'
        ]);


            $user = User::create([
                'username' => $request->username,
                'email'    => $request->email,
                'national_id_no' => $request->national_id_no,
                'password' => Hash::make($request->password),
            ]);

            // $employee = Employee::where('national_id_no', $request->national_id_no)->first();

            // $employee->update([
            //     'user_id'       => $user->id,
            //     'department_id' => $request->department_id,
            // ]);

            // $employee->email()->create([
            //     'email' => $request->email
            // ]);
//            $employee->telephone->create($request->telephone);

            return response()->json('User created');

    }

    /**
     * Fetches Department lists from storage
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartments()
    {
        $departments = Department::all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $departments,
            ]);
        }
    }
}
