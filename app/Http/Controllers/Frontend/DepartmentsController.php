<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\DepartmentRepository;

/**
 * Class Frontend/Departments Controller.
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
     * Frontend/Departments constructor.
     *
     * @param DepartmentRepository $repository
     */
    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = $this->repository->all();
        $departmentChunk = $departments->chunk(3);

        return view('Frontend.departments.index', compact('departmentChunk'));
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
        $department = $this->repository->with(['events', 'employees'])->find($id);

        $sop = $department->getMedia('sop');
        $charter = $department->getMedia('charter');
        $mission = $department->getMedia('mission');

        $documentsCollection = collect([$sop, $charter, $mission]);

        return view('Frontend.departments.show', compact('department', 'documentsCollection'));
    }
}
