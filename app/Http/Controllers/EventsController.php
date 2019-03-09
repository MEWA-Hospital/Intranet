<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use App\Domain\Department\Actions\CreateEventAction;
use App\Domain\Department\Actions\DeleteEventAction;
use App\Domain\Department\Actions\UpdateEventAction;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Domain\Department\DTO\EventData;
use Domain\Department\Models\Department;
use Domain\Department\Models\Event;
use Yajra\DataTables\DataTables;

/**
 * Class EventsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EventsController extends Controller
{

    /**
     *  Fetches dataTable records of specified resource
     *
     * @return mixed
     * @throws \Exception
     */
    public function dataTable()
    {
        $events = Event::all();

        return DataTables::of($events)
            ->addColumn('action', function ($event) {
                return ' <div class="list-icons">
					       <a href="' . route('admin.events.edit', $event->id) . '" class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
					       <form action="' . route('admin.events.destroy', $event->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . '
					       <button type="submit" onclick="return confirm(\'Are you sure you want to delete? \')" class="btn bg-transparent list-icons-item text-danger-600"><i class="icon-trash"></i></button>
					       </form>
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
        $events = Event::all();

        return view('Backend.events.index', compact('events'));
    }

    /**
     * Display form for creating resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $departments = Department::all();

        return view('Backend.events.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $eventRequest
     * @param CreateEventAction $createEventAction
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $eventRequest, CreateEventAction $createEventAction)
    {
        $createEventAction(EventData::fromRequest($eventRequest));

        $response = [
            'message' => 'Event created.',
        ];

        if (request()->wantsJson()) {

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
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $departments = Department::all();

        $start_date = Carbon::parse($event->start_date)->toIso8601String();

        $end_date = Carbon::parse($event->end_date)->toIso8601String();

        return view('Backend.events.edit', compact(
            'event', 'start_date', 'end_date', 'departments'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $eventRequest
     * @param UpdateEventAction $updateEventAction
     * @param  string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $eventRequest, UpdateEventAction $updateEventAction, $id)
    {
        $updateEventAction(EventData::fromRequest($eventRequest), $id);

        $response = [
            'message' => 'Event updated.',
        ];

        if (request()->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteEventAction $deleteEventAction
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteEventAction $deleteEventAction, $id)
    {
        $deleteEventAction($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Events deleted.',
            ]);
        }

        return redirect()->back();
    }
}
