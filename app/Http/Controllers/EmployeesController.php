<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
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

        return redirect()->back()->with('message', $response['message']);

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
        $employee = $this->repository->with(['user', 'email', 'telephone'])->find($id);

        return view('Backend.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {

        $employee = $this->repository->update($request->all(), $id);

        if ($request->has('email')) {
            $employee->email()->update([
                'email' => $request->email
            ]);
        }

        if ($request->has('telephone')) {
            $employee->telephone()->update([
                'telephone' => $request->telephone
            ]);
        }

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
            return response()->json('employee not found');
        }
    }
}
