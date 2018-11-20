<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EventsCreateRequest;
use App\Http\Requests\EventsUpdateRequest;
use App\Interfaces\EventsRepository;
use App\Interfaces\DepartmentRepository;
use App\Interfaces\UserRepository;
use App\Validators\EventsValidator;

/**
 * Class EventsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EventsController extends Controller
{
    /**
     * @var EventsRepository
     */
    protected $repository;

    // Department Repository
    protected $departmentRepository;

    protected $userRepository;

    /**
     * @var EventsValidator
     */
    protected $validator;

    /**
     * EventsController constructor.
     *
     * @param EventsRepository $repository
     * @param UserRepository $userRepository
     * @param DepartmentRepository $DepartmentRepository
     * @param EventsValidator $validator
     */
    public function __construct(EventsRepository $repository, UserRepository $userRepository, DepartmentRepository $DepartmentRepository, EventsValidator $validator)
    {
        $this->repository = $repository;
        $this->departmentRepository = $DepartmentRepository;
        $this->userRepository = $userRepository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $events = $this->repository->all(); //Finds all results in a repo,

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $events,
            ]);
        }

        return view('Backend.events.index', compact('events'));
    }

    public function create()
    {
        $departments = $this->departmentRepository->all();
        $users = $this->userRepository->all();

        return view('Backend.events.create', compact('departments', 'users'));
    }

    public function dataTable()
    {
        return $this->repository->getDataTable();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EventsCreateRequest $request)
    {

        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

       $this->repository->create($request->all());

        session()->flash('success', 'Event Created Successfully');

        return redirect()->route('events.index');


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
        $event = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $event,
            ]);
        }

        return view('events.show', compact('event'));
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
        $event = $this->repository->find($id);

        return view('Backend.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventsUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EventsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $event = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Events updated.',
                'data' => $event->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
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
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Events deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Events deleted.');
    }
}
