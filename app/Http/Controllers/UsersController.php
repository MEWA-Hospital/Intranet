<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\DepartmentRepository;
use App\Interfaces\EmployeeRepository;
use App\Interfaces\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var DepartmentRepository
     */
    protected $departmentRepository;

    /**
     * @var EmployeeRepository
     */
    protected $employeeRepository;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param DepartmentRepository $departmentRepository
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(UserRepository $repository, DepartmentRepository $departmentRepository, EmployeeRepository $employeeRepository)
    {
        $this->repository = $repository;
        $this->departmentRepository = $departmentRepository;
        $this->employeeRepository = $employeeRepository;
    }

    /**
     *  Fetches dataTable records of specified resource
     * @return mixed
     */
    public function dataTable()
    {
        return $this->repository->getDataTable();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $users = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $users,
            ]);
        }

        return view('Backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.user.create');
    }

    /**
     * Store a newly created resource in storage
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $this->validate($request, [
            'name'             => 'required|string|min:3|max:255',
            'gender'           => 'required|string|max:6',
            'department_id'    => 'required|numeric',
            'designation'      => 'required|string|max:50',
            'dob'              => 'required|date',
            'date_employed'    => 'required|date|after:dob',
            'employee_type_id' => 'required|numeric',
            'physical_address' => 'nullable|string|max:255',
            'national_id_no'   => 'required|string|max:20',
            'nhif_no'          => 'nullable|string|max:50',
            'nssf_no'          => 'nullable|string|max:50',
            'kra_pin'          => 'nullable|string|max:50',
            'biometric_code'   => 'nullable|numeric'

        ]);

        $user = $this->repository->skipPresenter()->create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt('password')
        ]);

        $user->employee()->create([
            'name'             => $request->name,
            'gender'           => $request->gender,
            'department_id'    => $request->department_id,
            'designation'      => $request->designation,
            'dob'              => $request->dob,
            'date_employed'    => $request->date_employed,
            'employee_type_id' => $request->employee_type_id,
            'physical_address' => $request->physical_address,
            'national_id_no'   => $request->national_id_no,
            'nhif_no'          => $request->nhif_no,
            'nssf_no'          => $request->nssf_no,
            'kra_pin'          => $request->kra_pin,
            'biometric_code'   => $request->biometric_code,
        ]);

        if ($request->wantsJson()) {
            return response()->json('User created!.');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->with(['employee'])->find($id);

        return view('Backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $this->validate($request, [
            'name'             => 'required|string|min:3|max:255',
            'gender'           => 'required|string|max:6',
            'department_id'    => 'required|numeric',
            'designation'      => 'required|string|max:50',
            'dob'              => 'required|date',
            'date_employed'    => 'required|date|after:dob',
            'employee_type_id' => 'required|numeric',
            'physical_address' => 'nullable|string|max:255',
            'national_id_no'   => 'required|string|max:20',
            'nhif_no'          => 'nullable|string|max:50',
            'nssf_no'          => 'nullable|string|max:50',
            'kra_pin'          => 'nullable|string|max:50',
            'biometric_code'   => 'nullable|numeric'
        ]);

        $user = $this->repository->update([
            'username' => $request->username,
            'email'    => $request->email,
        ], $id);

        $user->employee()->update([
            'name'             => $request->name,
            'gender'           => $request->gender,
            'department_id'    => $request->department_id,
            'designation'      => $request->designation,
            'dob'              => Carbon::parse($request->dob),
            'date_employed'    => Carbon::parse($request->date_employed),
            'employee_type_id' => $request->employee_type_id,
            'physical_address' => $request->physical_address,
            'national_id_no'   => $request->national_id_no,
            'nhif_no'          => $request->nhif_no,
            'nssf_no'          => $request->nssf_no,
            'kra_pin'          => $request->kra_pin,
            'biometric_code'   => $request->biometric_code,
        ]);

        if ($request->wantsJson()) {

            return response()->json('User updated.');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        session()->flash('info', 'User Deleted');

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Group deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'User deleted.');
    }

    public function showActivateForm($id)
    {
        $inactiveUser = $this->repository->find($id);

        return view('Backend.user.activate', compact('inactiveUser'));
    }

    public function activateUser(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'username'         => 'required|string|max:20',
            'email'            => 'required|email|regex:/^[A-Za-z0-9\.]*@(mewa)[.](or)[.](ke)$/',
            'telephone'        => 'nullable|numeric|unique:users|size:10',
            'name'             => 'required|string|min:3|max:255',
            'gender'           => 'required|string|max:6',
            'department_id'    => 'required|numeric',
            'designation'      => 'required|string|max:50',
            'dob'              => 'required|date',
            'date_employed'    => 'required|date|after:dob',
            'employee_type_id' => 'required|numeric',
            'physical_address' => 'nullable|string|max:255',
            'national_id_no'   => 'required|string|max:20',
            'nhif_no'          => 'nullable|string|max:50',
            'nssf_no'          => 'nullable|string|max:50',
            'kra_pin'          => 'nullable|string|max:50',
            'biometric_code'   => 'nullable|numeric'
        ]);

        $employee = $this->employeeRepository->find($request->employee_id);

        $user = $this->repository->find($request->user_id);

        $employee->update([
            'user_id'          => $user->id,
            'department_id'    => $request->department_id,
            'biometric_code'   => $request->biometric_code,
            'designation'      => $request->designation,
            'physical_address' => $request->physical_address
        ]);

        $user->update([
            'isActive' => 1
        ]);

        if ($request->wantsJson()) {
            return response()->json('User activated!.');
        }
    }

    /**
     * @param Request $request
     */
    public function searchBiometricCode(Request $request)
    {

        $searchTerm = $request->biometricSearch;
        $search =  $request->biometricSearch . '%';

        $timecode = \DB::connection('otl')
        ->table('Emp_Master')
        ->where('Emp_Name' ,  'like',  $search  )
        ->orWhere('Emp_Code', 'like', $searchTerm)
        ->get();

        if ($request->wantsJson() && $timecode) {
            return response()->json($timecode);
        }
        return response()->json('Code Not found');
    }
}
