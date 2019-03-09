<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers\Frontend;

use App\Domain\Department\Actions\CreateEventAction;
use App\Events\EventReceivedNewComment;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Domain\Department\DTO\EventData;
use Domain\Department\Models\Event;
use Domain\User\Models\Comment;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();

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

    /**
     * @param EventRequest $eventRequest
     * @param CreateEventAction $createEventAction
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
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
     * Display the specified resource
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $event = Event::find($id);

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
        $event = Event::find($id);

        $comment = $event->comments()->create([
            'body'    => $request->body,
            'user_id' => auth()->id(),
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
        $event = Event::find($id);

        $comments = $event->comments()->with('user')->paginate(15);

        return response()->json($comments);
    }
}
