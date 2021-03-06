<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        return 'Disabled!';

    }

    /**
     * Create a new user and associated records after a valid registration.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
            'username'       => $request->username,
            'email'          => $request->email,
            'national_id_no' => $request->national_id_no,
            'password'       => Hash::make($request->password),
        ]);

        return response()->json(['User created' => $user]);

    }

    /**
     * Fetches Department lists from storage
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartments()
    {
        $departments = Department::all();

        return response()->json([
            'data' => $departments,
        ]);
    }
}
