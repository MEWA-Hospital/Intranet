<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\MemoCreateRequest;
use App\Http\Requests\MemoUpdateRequest;
use App\Interfaces\MemoRepository;

/**
 * Class MemosController.
 *
 * @package namespace App\Http\Controllers;
 */
class MemosController extends Controller
{
    /**
     * @var MemoRepository
     */
    protected $repository;

    /**
     * MemosController constructor.
     *
     * @param MemoRepository $repository
     */
    public function __construct(MemoRepository $repository)
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

        $memos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $memos,
            ]);
        }

        return view('backend.memos.index', compact('memos'));
    }

    /**
     * Display form for creating resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $departments = Department::all();

        return view('backend.memos.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MemoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(MemoCreateRequest $request)
    {
        $memo = $this->repository->create($request->all());

        $memo->department()->attach($request->to);

        $response = [
            'message' => 'Memo created.',
            'data' => $memo->toArray(),
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
        $memo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $memo,
            ]);
        }

        return view('memos.show', compact('memo'));
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
        $memo = $this->repository->find($id);

        return view('backend.memos.edit', compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MemoUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     */
    public function update(MemoUpdateRequest $request, $id)
    {
        $memo = $this->repository->update($request->all(), $id);

        $response = [
            'message' => 'Memo updated.',
            'data' => $memo->toArray(),
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
        $memo = $this->repository->find($id);

        $departments = $memo->department;

        $memo->department()->detach($departments);

        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Memo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Memo deleted.');
    }
}
