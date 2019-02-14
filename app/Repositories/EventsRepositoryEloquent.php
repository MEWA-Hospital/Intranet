<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Repositories;

use App\Interfaces\EventsRepository;
use App\Models\Events;
use App\Traits\CacheableRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Yajra\DataTables\DataTables;

/**
 * Class EventsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EventsRepositoryEloquent extends BaseRepository implements EventsRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Events::class;
    }

    /**
     * Boot up the repository, pushing criteria4
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     * @throws \Exception
     */
    public function getDataTable()
    {
        $events = $this->model->with(['department'])->orderBy('created_at', 'desc');

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

    public function latest($column = 'created_at')
    {
        return $this->orderBy($column, 'desc');
    }
}
