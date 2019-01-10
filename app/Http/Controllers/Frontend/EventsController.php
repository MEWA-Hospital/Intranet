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
use App\Interfaces\EventsRepository;
use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * @var EventsRepository
     */
    protected $repository;

    /**
     * NewsController constructor.
     *
     * @param EventsRepository $repository
     */
    public function __construct(EventsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $events = Events::upcoming()->with('department')->paginate(15);

//        $events = $this->repository->with(['department'])->paginate(15);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $events,
            ]);
        }

        return view('Frontend.events.index', compact('events'));
    }

    /**
     * Shows specified resource
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $event = $this->repository->with( 'department')->find($id);

        $event->visits()->record();
        return view('Frontend.events.show', compact('event'));
    }

    /**
     * Stores a newly created comment in storage
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function comment(Request $request, $id)
    {
        $event = $this->repository->find($id);

        $comment = $event->comments()->create([
            'body'    => $request->body,
            'user_id' => Auth()->id(),
        ]);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $comment->load('user'),
            ]);
        }

        return redirect()->back();
    }

    public function updateComment($id)
    {

    }

    public function getComments($id)
    {
        $event = $this->repository->find($id);

        $comments = $event->comments()->with('user')->paginate(20);

        return response()->json($comments);
    }
}
