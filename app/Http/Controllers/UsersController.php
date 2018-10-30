<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\DepartmentRepository;
use App\Interfaces\UserRepository;
use App\Repositories\DepartmentRepositoryEloquent;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var DepartmentRepository
     */
    protected $departmentRepository;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param DepartmentRepositoryEloquent $departmentRepository
     */
    public function __construct(UserRepository $repository, DepartmentRepositoryEloquent $departmentRepository)
    {
        $this->repository = $repository;
        $this->departmentRepository = $departmentRepository;
    }

    /**
     *  Fetches dataTable records of specified resource
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

        $users = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $users,
            ]);
        }

        return view('Backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = $this->departmentRepository->all();

        return view('Backend.user.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        try {

            $this->repository->create([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'telephone'     => $request->telephone,
                'department_id' => $request->department_id,
                'group_id'      => $request->group_id,
                'designation'   => $request->designation,
                'password'      => $request->password ? $request->password : config('intranet.default_password')
            ]);

            session()->flash('success', 'user created with a default password of ' . config('intranet.default_password') . '');

            return redirect()->back();

        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->skipPresenter()->find($id);

        $departments = $this->departmentRepository->all();

        return view('Backend.user.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {

            $this->repository->update([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'telephone'     => $request->telephone,
                'department_id' => $request->department_id,
                'group_id'      => $request->group_id,
                'designation'   => $request->designation,
                'password'      => $request->password ? $request->password : config('intranet.default_password')

            ], $id);

            $response = [
                'message' => session()->flash('info', 'User updated.'),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        session()->flash('info', 'User Deleted');

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Group deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'User deleted.');
    }
}
