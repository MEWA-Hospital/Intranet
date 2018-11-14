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

    public function show($id)
    {
        $news = $this->repository->find($id);

        return view('Frontend.news.show', compact('news'));
    }

    public function comment(Request $request, $id)
    {
//        dd($request->all());
        $news = $this->repository->find($id);

        $news->comments()->create([
            'body' => $request->body,
            'user_id' => \Auth::user()->id,
        ]);

        return redirect()->back();
    }

    public function updateComment($id)
    {

    }
}
