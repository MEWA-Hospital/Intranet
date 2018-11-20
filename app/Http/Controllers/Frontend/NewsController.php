<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\NewsRepository;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * @var NewsRepository
     */
    protected $repository;

    /**
     * NewsController constructor.
     *
     * @param NewsRepository $repository
     */
    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $news = $this->repository->with(['department', 'user'])->paginate(15);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $news,
            ]);
        }

        return view('Frontend.news.index', compact('news'));
    }

    /**
     * Shows specified resource
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $news = $this->repository->find($id);

        return view('Frontend.news.show', compact('news'));
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
        $news = $this->repository->find($id);

        $comment = $news->comments()->create([
            'body'    => $request->body,
            'user_id' => \Auth::user()->id,
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
        $news = $this->repository->find($id);

        $comments = $news->comments()->paginate(20);

        if (request()->wantsJson()) {
            return response()->json($comments);
        };
    }
}
