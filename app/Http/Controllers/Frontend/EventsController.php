<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers\Frontend;

use App\Events\EventReceivedNewComment;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventsCreateRequest;
use App\Interfaces\EventsRepository;
use App\Models\Comment;
use Carbon\Carbon;
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

        $events = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $events,
            ]);
        }

        return view('Frontend.events.index', compact('events'));
    }

    /**
     * Show the form for creating resource
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Frontend.events.create');
    }

    public function store(EventsCreateRequest $request)
    {
        $data = $request->all();

        // parse the dates into a timestamp format
        $data['start_date'] = Carbon::parse($request->start_date);
        $data['end_date'] = Carbon::parse($request->end_date);

        $data['department_id'] = auth()->user()->employee->department->id ?? null;

        $this->repository->create($data);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Event created.',
            ]);
        }

        return redirect()->back();

    }

    /**
     * Shows specified resource
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $event = $this->repository->with('department')->find($id);

//        $event->visits()->record();

        return view('Frontend.events.show', compact('event'));
    }

    /**
     * Stores a newly created comment in storage
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function storeComment(Request $request, $id)
    {
        $event = $this->repository->find($id);

        $comment = $event->comments()->create([
            'body'    => $request->body,
            'user_id' => Auth()->id(),
        ]);

        event(new EventReceivedNewComment($comment));

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $comment->load('user'),
            ]);
        }

        return redirect()->back();
    }

    /**
     * Update specified comment
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateComment(Request $request, $id)
    {
        $comment = Comment::find($id);

        if ($comment->user_id === auth()->id()) {

            $comment->update(['body' => $request->body]);

            $comment->save();

            event(new EventReceivedNewComment($comment));

            return response()->json('comment updated');

        }

        return response()->json('You are not authorized to perform this action', '401');
    }

    /**
     * Delete the specified comment from storage
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteComment($id)
    {
        $comment = Comment::find($id);

        if ($comment->user_id === auth()->id()) {
            $comment->delete();

            return response()->json('comment deleted');
        }

        return response()->json('You are not authorized to perform this action', '401');


    }

    /**
     * Retrieves the specified event comments
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComments($id)
    {
        $event = $this->repository->find($id);

        $comments = $event->comments()->with('user')->paginate(15);

        return response()->json($comments);
    }
}
