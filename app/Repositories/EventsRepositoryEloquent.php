<?php

namespace App\Repositories;

use App\Interfaces\EventsRepository;
use App\Models\Events;
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

    public function getDataTable()
    {
        $events = $this->model->with(['user', 'department']);

        return DataTables::of($events)
            ->addColumn('action', function ($event) {
                return ' <div class="list-icons">
					       <a href="' . route('events.edit', $event->id) . '" class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
					       <form action="' . route('events.destroy', $event->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . '
					       <button type="submit" onclick="return confirm(\'Are you sure you want to delete? \')" class="btn bg-transparent list-icons-item text-danger-600"><i class="icon-trash"></i></button>
					       </form>
					    </div>';
            })->make(true);

    }

}
