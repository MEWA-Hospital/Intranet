<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use App\Domain\Department\Actions\CreateDepartmentAction;
use App\Domain\Department\Actions\DeleteDepartmentAction;
use App\Domain\Department\Actions\UpdateDepartmentAction;
use App\Http\Requests\DepartmentRequest;
use Domain\Department\DTO\DepartmentData;
use Domain\Department\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

/**
 * Class DepartmentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class DepartmentsController extends Controller
{

    /**
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     * @throws \Exception
     */
    public function dataTable()
    {
        $departments = Department::all();

        return DataTables::of($departments)
            ->addColumn('action', function ($department) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu3"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						<a href="' . route('admin.departments.show', $department->id) . '" class="dropdown-item"><i class="icon-eye"></i> View</a>
						<a href="' . route('admin.departments.edit', $department->id) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('admin.departments.destroy', $department->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . ' 
						<button type="submit" class="dropdown-item" onclick="return confirm(\'Are you sure you want to delete? \')"><i class="icon-trash"></i> Delete</button>
						</form>
						</div>
						</div>
						</div>';
            })->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        if (request()->wantsJson()) {
            return response()->json($departments);
        };

        return view('Backend.department.index');
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
     * @param DepartmentRequest $departmentRequest
     * @param CreateDepartmentAction $createDepartmentAction
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $departmentRequest, CreateDepartmentAction $createDepartmentAction)
    {
        $createDepartmentAction(DepartmentData::fromRequest($departmentRequest));

        $response = [
            'message' => 'Department created.',
        ];

        if (request()->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        if (request()->wantsJson()) {

            return response()->json($department);
        }

        return view('Backend.department.show', compact('department', 'documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('Backend.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $departmentRequest
     * @param UpdateDepartmentAction $updateDepartmentAction
     * @param  string $id
     *
     * @return \Response
     */
    public function update(DepartmentRequest $departmentRequest, UpdateDepartmentAction $updateDepartmentAction, $id)
    {
        $updateDepartmentAction(DepartmentData::fromRequest($departmentRequest), $id);

        $response = [
            'message' => 'Department updated.',
        ];

        if (request()->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param DeleteDepartmentAction $deleteDepartmentAction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteDepartmentAction $deleteDepartmentAction)
    {
        $deleteDepartmentAction($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Department deleted.'
            ]);
        }

        return redirect()->back()->with('message', 'Department deleted.');
    }

    /**
     * Retrieves department documents
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartmentDocuments($id)
    {
        $department = $this->repository->find($id);

        $sop = $department->getMedia('sop');
        $charter = $department->getMedia('charter');
        $mission = $department->getMedia('mission');

        $documents = collect([$sop, $charter, $mission]);

        return response()->json($documents);
    }

    /**
     * Associates uploaded file with a department
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function processUploadedDocuments(Request $request)
    {
        $department = Department::find($request->id);

        $type = $request->type;

        if ($request->hasFile('document')) {
            $document = $request->file('document');

            $department->clearMediaCollection($type);

            $department->addMedia($document)
                ->sanitizingFileName(function ($fileName) {
                    return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                })
                ->usingName($type)
                ->toMediaCollection($type);

            return response()->json(['Document uploaded']);
        }


    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDetails($id)
    {
        $this->repository->update([
            'hod'   => request()->get('hod'),
            'email' => request()->get('email'),
        ], $id);

        return response()->json('Department Update');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOverview($id)
    {
        $this->repository->update([
            'overview' => request()->get('overview'),
        ], $id);

        return response()->json('Department Update');
    }
}
