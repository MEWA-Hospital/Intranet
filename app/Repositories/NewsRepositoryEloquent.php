<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Repositories;

use App\Criteria\CommentsCountCriteria;
use App\Interfaces\NewsRepository;
use App\Models\News;
use App\Presenters\NewsPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;
use Yajra\DataTables\DataTables;

/**
 * Class NewsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(CommentsCountCriteria::class);
    }

    /**
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     * @throws \Exception
     */
    public function getDataTable()
    {
        $news = $this->model->with(['department', 'user']);

        return DataTables::of($news)
            ->addColumn('action', function ($news) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						<a href="' . route('admin.news.edit', $news->id) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('admin.news.destroy', $news->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . ' 
						<button type="submit" class="dropdown-item" onclick="return confirm(\'Are you sure you want to delete? \')"><i class="icon-trash"></i> Delete</button>
						</form>
						</div>
						</div>
						</div>';
            })->make(true);
    }

}
