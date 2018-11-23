<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\EventsRepository;
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

        $events = $this->repository->with(['department', 'user'])->paginate(15);

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
        $event = $this->repositoryeventsre->with(['user', 'department'])->find($id);

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

        $comments = $event->comments()->paginate(20);

        if (request()->wantsJson()) {
            return response()->json($comments);
        };
    }
}
