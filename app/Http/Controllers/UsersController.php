<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\ViewModels\UserViewModel;
use App\Mail\WelcomeUser;
use Domain\Department\Actions\CreateEmployeeAction;
use Domain\Department\Actions\UpdateEmployeeAction;
use Domain\Department\DTO\EmployeeData;
use Domain\User\Actions\CreateUserAction;
use Domain\User\Actions\UpdateUserAction;
use Domain\User\DTO\UserData;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{

    public function dataTable()
    {
        $users = User::all();

        return DataTables::of($users)->editColumn('isActive', function ($user) {
            if ($user->isActive == 0) {
                return '<span class="badge badge-danger">Inactive</span>';
            } else {
                return '<span class="badge badge-success">Active</span>';
            }
        })
            ->addColumn('action', function ($user) {
                return ' <div class="list-icons">
					       <a href="' . route('admin.users.edit', $user->id) . '" class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
					       <form action="' . route('admin.users.destroy', $user->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . '
					       <button type="submit" onclick="return confirm(\'Are you sure you want to delete? \')" class="btn bg-transparent list-icons-item text-danger-600"><i class="icon-trash"></i></button>
					       </form>
					       <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu7"></i></a>
                            
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="' . route('profile.index', $user->username) . ' " target="_blank" class="dropdown-item"><i class="icon-user-tie"></i> Profile</a>
                                <a href="' . route('admin.users.show-activate-form', $user->id) . '" class="dropdown-item"><i class="icon-check"></i> Activate Account</a>
                            </div>
                        </div>
                    </div>';
            })
            ->rawColumns(['isActive', 'username', 'action'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Backend.user.index');
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
     * @param UserRequest $userRequest
     * @param CreateUserAction $createUserAction
     * @param CreateEmployeeAction $createEmployeeAction
     * @return \Illuminate\Http\Response
     */
    public function store(
        UserRequest $userRequest,
        CreateUserAction $createUserAction,
        CreateEmployeeAction $createEmployeeAction
    ) {
        $user = $createUserAction(UserData::fromRequest($userRequest));

        $request = [];

        $request[] = $userRequest;

        $request['user_id'] = $user->id;

        $createEmployeeAction(EmployeeData::fromArray($request));

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'User Created.',
            ]);
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userViewModel = new UserViewModel($user);

        return view('Backend.user.edit', $userViewModel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $userRequest
     * @param UpdateUserAction $updateUserAction
     * @param UpdateEmployeeAction $updateEmployeeAction
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        UserRequest $userRequest,
        UpdateUserAction $updateUserAction,
        UpdateEmployeeAction $updateEmployeeAction,
        $id
    ) {
        $user = $updateUserAction(UserData::fromRequest($userRequest), $id);

        $request = [];

        $request[] = $userRequest;

        $request['user_id'] = $user->id;

        $updateEmployeeAction(EmployeeData::fromArray($request), $id);

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
        $inactiveUser = User::find($id);

        return view('Backend.user.activate', compact('inactiveUser'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function activateUser(Request $request)
    {
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

        \Mail::to($user)->send(new WelcomeUser($user));

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
        $search = $request->biometricSearch . '%';

        $timecode = \DB::connection('otl')
            ->table('Emp_Master')
            ->where('Emp_Name', 'like', $search)
            ->orWhere('Card_Ref_No', 'like', $searchTerm)
            ->get();

        if ($request->wantsJson() && $timecode) {
            return response()->json($timecode);
        }
        return response()->json('Code Not found');
    }
}
