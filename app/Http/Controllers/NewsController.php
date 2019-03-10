<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use App\Domain\Department\Actions\CreateNewsAction;
use App\Domain\Department\Actions\DeleteNewsAction;
use App\Domain\Department\Actions\UpdateNewsAction;
use App\Domain\Department\DTO\NewsData;
use App\Http\Requests\NewsRequest;
use Domain\Department\Models\News;
use Yajra\DataTables\DataTables;

/**
 * Class NewsController.
 *
 * @package namespace App\Http\Controllers;
 */
class NewsController extends Controller
{
    /**
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     * @throws \Exception
     */
    public function dataTable()
    {
        $news = News::all();

        return DataTables::of($news)
            ->addColumn('action', function ($news) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						<a href="' . route('admin.news.edit', $news) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('admin.news.destroy', $news->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . ' 
						<button type="submit" class="dropdown-item" onclick="return confirm(\'Are you sure you want to delete? \')"><i class="icon-trash"></i> Delete</button>
						</form>
						</div>
						</div>
						</div>';
            })
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.news.index');
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $newsRequest
     * @param CreateNewsAction $createNewsAction
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $newsRequest, CreateNewsAction $createNewsAction)
    {
        $createNewsAction(NewsData::fromRequest($newsRequest));

        $response = [
            'message' => 'News created.',
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
        $news = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $news,
            ]);
        }

        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('Backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $newsRequest
     * @param UpdateNewsAction $updateNewsAction
     * @param  string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $newsRequest, UpdateNewsAction $updateNewsAction, $id)
    {
        $updateNewsAction(NewsData::fromRequest($newsRequest), $id);

        $response = [
            'message' => 'News updated.',
        ];

        if (request()->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteNewsAction $deleteNewsAction
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteNewsAction $deleteNewsAction, $id)
    {
        $deleteNewsAction($id);

        $response = [
            'message' => 'News deleted.',
        ];

        if (request()->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back()->with('message', 'News deleted.');
    }
}
