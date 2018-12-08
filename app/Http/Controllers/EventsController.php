<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsCreateRequest;
use App\Http\Requests\EventsUpdateRequest;
use App\Interfaces\EventsRepository;
use Carbon\Carbon;

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

        $user = auth()->user();

        $this->repository->create([
            'name'          => $request->name,
            'body'          => $request->body,
            'venue'         => $request->venue,
            'start_date'    => Carbon::parse($request->start_date),
            'end_date'      => Carbon::parse($request->end_date),
            'user_id'       => $user->id,
//            'department_id' => $user->employee->department->id
        ]);

        if (request()->wantsJson()) {

            return response()->json('Event created');
        }

        session()->flash('flash', 'event created');

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

        $start_date = Carbon::parse($event->start_date)->toIso8601String();
        $end_date = Carbon::parse($event->end_date)->toIso8601String();

        return view('Backend.events.edit', compact('event', 'start_date', 'end_date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventsUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(EventsUpdateRequest $request, $id)
    {
        $this->repository->update([
            'name'       => $request->name,
            'body'       => $request->body,
            'venue'      => $request->venue,
            'start_date' => Carbon::parse($request->start_date),
            'end_date'   => Carbon::parse($request->end_date),
        ], $id);

        session()->flash('flash', 'Event updated');

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
                'message' => 'Events deleted.',
                'deleted' => $deleted,
            ]);
        }
        session()->flash('flash', 'event deleted');

        return redirect()->back();
    }
}
