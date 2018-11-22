<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\EventsRepository;
use App\Models\Events;
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
            ->addColumn('action', function ($user) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						<a href="' . route('events.edit', $user->id) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('events.destroy', $user->id) . '" method="post">
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
