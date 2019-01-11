<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Interfaces\EmployeeRepository;


/**
 * Class EmployeesController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmployeesController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    protected $repository;


    /**
     * EmployeesController constructor.
     *
     * @param EmployeeRepository $repository
     */
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;

    }

    /**
     * Retrieves dataTable records of employees
     *
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
        $employees = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employees,
            ]);
        }

        return view('Backend.employees.index', compact('employees'));
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
        $employee = $this->repository->findByField('national_id_no', $national_id_no)->first();

        if ($employee) {

            return response()->json([
                'data' => $employee,
            ]);

        } else {
            return response()->json(['data' => 'employee not found']);
        }
    }
}
