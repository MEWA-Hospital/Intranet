<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentCreateRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Interfaces\DepartmentRepository;
use App\Models\Department;
use Illuminate\Http\Request;

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
                'data' => $departments
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
        $department = $this->repository->create($request->all());

        $response = [
            'message' => 'Department created.',
            'data'    => $department->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

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

        return view('Backend.department.show', compact('department'));
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
        $department = $this->repository->update($request->all(), $id);

        $response = [
            'message' => 'Department updated.',
            'data'    => $department->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

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

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Department deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Department deleted.');
    }

    /**
     * Retrieves department documents (sop/mission/vision ..etc)
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

    public function processUploadedDocuments(Request $request)
    {
        $department = Department::find($request->id);

        $type = $request->type;

        if ($request->hasFile('document')) {
            $document = $request->file('document');

            $department->clearMediaCollection($type);

            $department->addMedia($document)->toMediaCollection($type);

            return response()->json(['Document uploaded']);
        }


    }
}
