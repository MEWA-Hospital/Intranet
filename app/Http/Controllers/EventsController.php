<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsCreateRequest;
use App\Http\Requests\EventsUpdateRequest;
use App\Interfaces\EventsRepository;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

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

    /**
     * EventsController constructor.
     *
     * @param EventsRepository $repository
     */
    public function __construct(EventsRepository $repository)
    {
        $this->repository = $repository;
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

        $events = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $events,
            ]);
        }

        return view('Backend.events.index', compact('events'));
    }

    /**
     * Display form for creating resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventsCreateRequest $request)
    {
        $user = Auth::user();
        dd($user->load('employee'));
        $event = $this->repository->create([
            'name'          => $request->name,
            'body'          => $request->body,
            'venue'         => $request->venue,
            'user_id'       => $user->id,
            'department_id' => $user->employee->department->id
        ]);

        if (request()->wantsJson()) {

            return response()->json([
                $event,
            ]);
        }
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
                'data'    => $event->toArray(),
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
