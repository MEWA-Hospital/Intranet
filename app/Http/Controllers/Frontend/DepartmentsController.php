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
//        dd($departments);
        return view('Frontend.departments.index', compact('departments'));
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
//        dd($department);
        return view('Frontend.departments.show', compact('department'));
    }
}
