<?php

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
    protected $redirectTo = '/home';

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
            'username'  => 'required|string|max:50',
            'email'     => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|string|unique:users|digits:10',
            'password'  => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username'  => $data['username'],
            'email'     => $data['email'],
            'telephone' => $data['telephone'],
            'password'  => Hash::make($data['password']),
        ]);

    }

    protected function handleAccountRequest(Request $request)
    {
        $this->validate($request, [
            'username'      => 'required|string|max:50',
            'email'         => 'required|string|email|max:255|unique:users',
            'telephone'     => 'required|string|unique:users|digits:10',
            'first_name'    => 'required|string|max:50',
            'last_name'     => 'required|string|max:50',
            'password'      => 'required|string|min:6',
            'department_id' => 'required'
        ]);

        $user = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'telephone' => $request->telephone,
            'password'  => Hash::make($request->password),
        ]);

        $employee = $user->employee()->create([
            'department_id' => $request->department_id,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
        ]);

        $employee->email()->create([
            'email' => $request->email
        ]);

        $employee->telephone()->create([
            'telephone' => $request->telephone
        ]);

        return response()->json($user);
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
