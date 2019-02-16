<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

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
        $this->repository->skipPresenter();
    }


    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = $this->repository->all();

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

        return view('Frontend.departments.show', compact('department'));
    }
}
