<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Domain\Department\Models\Employee;
use Yajra\DataTables\DataTables;


/**
 * Class EmployeesController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmployeesController extends Controller
{

    /**
     * Retrieves dataTable records of employees
     *
     * @return mixed
     * @throws \Exception
     */
    public function dataTable()
    {
        $employees = Employee::all();

        return DataTables::of($employees)
            ->addColumn('action', function ($employee) {
                return ' <div class="list-icons">
					       <a href="' . route('admin.employees.edit', $employee->id) . '" class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
					       <form action="' . route('admin.employees.destroy', $employee->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . '
					       <button type="submit" onclick="return confirm(\'Are you sure you want to delete? \')" class="btn bg-transparent list-icons-item text-danger-600"><i class="icon-trash"></i></button>
					       </form>
					       <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu7"></i></a>
                            
                            <div class="dropdown-menu dropdown-menu-right">
                                
                            </div>
                        </div>
                    </div>';
            })
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.employees.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeCreateRequest $request
     *
     * @return void
     *
     */
    public function store(EmployeeCreateRequest $request)
    {
        $employee = $this->repository->create($request->all());

        $response = [
            'message' => 'Employee created.',
            'data'    => $employee->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employee,
            ]);
        }

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->repository->find($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {

        $employee = $this->repository->update($request->all(), $id);

        $response = [
            'message' => 'Employee updated.',
            'data'    => $employee->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back()->with('message', $response['message']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Employee deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Employee deleted.');
    }

    public function search($national_id_no)
    {
        $employee = Employee::where('national_id_no', $national_id_no)->first();

        if ($employee) {

            return response()->json($employee);

        } else {
            return response()->json(['data' => 'employee not found']);
        }
    }
}
