<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentCreateRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Interfaces\DepartmentRepository;

/**
 * Class DepartmentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class DepartmentsController extends Controller
{
    /**
     * @var DepartmentRepository
     */
    protected $repository;

    /**
     * DepartmentsController constructor.
     *
     * @param DepartmentRepository $repository
     */
    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Fetches dataTable records of specified resource
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
        $departments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                 $departments,
            ]);
        }

        return view('Backend.department.index', compact('departments'));
    }


    /**
     * Show the form for creating a resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Backend.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DepartmentCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(DepartmentCreateRequest $request)
    {
        $this->repository->create([
            'name'         => $request->name,
            'email'        => $request->email,
            'mailing_list' => $request->mailing_list,
            'token'        => str_random(24),
            'branch_id'    => 1,
        ]);

        session()->flash('success', 'Department created');

        return redirect()->back();

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
        $department = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $department,
            ]);
        }

        return view('departments.show', compact('department'));
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
        $department = $this->repository->find($id);

        return view('Backend.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DepartmentUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     */
    public function update(DepartmentUpdateRequest $request, $id)
    {

        $this->repository->update([
            'name'         => $request->name,
            'email'        => $request->email,
            'mailing_list' => $request->mailing_list,
            'token'        => str_random(24),
            'branch_id'    => 1,
        ], $id);

        session()->flash('info', 'Department updated');

        return redirect()->back();

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

        session()->flash('info', 'Department deleted');

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Department deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Department deleted.');
    }
}
