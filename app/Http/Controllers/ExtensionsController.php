<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtensionCreateRequest;
use App\Http\Requests\ExtensionUpdateRequest;
use App\Interfaces\DepartmentRepository;
use App\Interfaces\EmployeeRepository;
use App\Interfaces\ExtensionRepository;
use App\Validators\ExtensionValidator;

/**
 * Class ExtensionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ExtensionsController extends Controller
{
    /**
     * @var ExtensionRepository
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
     * ExtensionsController constructor.
     *
     * @param ExtensionRepository $repository
     * @param DepartmentRepository $departments
     * @param EmployeeRepository $employees
     */
    public function __construct(
        ExtensionRepository $repository,
        DepartmentRepository $departments,
        EmployeeRepository $employees
    ) {
        $this->repository = $repository;
        $this->departmentRepository = $departments;
        $this->employeeRepository = $employees;
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
        $extensions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $extensions,
            ]);
        }

        return view('Backend.extensions.index', compact('extensions'));
    }

    /**
     * Shows the form for creating the specified resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $departments = $this->departmentRepository->all();

        $employees = $this->employeeRepository->all();

        return view('Backend.extensions.create', compact('departments', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ExtensionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(ExtensionCreateRequest $request)
    {
        $employees = $this->employeeRepository->findWhereIn('id', $request->employee_id);

        $extension = $this->repository->create($request->all());
        foreach ($employees as $employee)
        {
            $employee->extension
        }
        foreach ($extension->employees as $employee)
        {
            dd($employee);
        }
        dd('l');
//        $extension->employees->attach($employees);
//
//        $employees->map(function ($employee) use ($extension) {
//
//            $employee->extension_id = $extension->id;
//
//            $employee->save();
//
//        });

        $response = [
            'message' => 'Extension created.',
            'data'    => $extension->toArray(),
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
        $extension = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $extension,
            ]);
        }

        return view('Backend.extensions.show', compact('extension'));
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
        $extension = $this->repository->with('employees')->find($id);

        $departments = $this->departmentRepository->all();

        $employees = $this->employeeRepository->all();

        return view('Backend.extensions.edit', compact('extension', 'departments', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ExtensionUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     */
    public function update(ExtensionUpdateRequest $request, $id)
    {
        $extension = $this->repository->with('employees')->find($id);

        $prevEmployees = $extension->employees;

        $prevEmployees->map(function ($prevEmployee) {

            $prevEmployee->extension_id = null;

        });

        $employees = $this->employeeRepository->findWhereIn('id', $request->employee_id);

        $updatedExtension = $this->repository->update($request->all(), $id);

        $employees->map(function ($employee) use ($updatedExtension) {

            $employee->extension_id = $updatedExtension->id;

            $employee->save();

        });

        $response = [
            'message' => 'Extension updated.',
            'data'    => $updatedExtension->toArray(),
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
        $extension = $this->repository->with('employees')->find($id);

        foreach ($extension->employees as $employee) {
            dd($employee);
            $employee->extension_id = null;
        }


        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Extension deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Extension deleted.');
    }
}
