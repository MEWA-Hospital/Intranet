<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\FoodRepository;
use App\Models\Food;
use App\Validators\FoodValidator;
use Yajra\DataTables\DataTables;
/**
 * Class FoodRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FoodRepositoryEloquent extends BaseRepository implements FoodRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Food::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FoodValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function getDataTable()
    {
        $foods = $this->model->all();

        return DataTables::of($foods)
            ->addColumn('action', function ($foods) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						<a href="' . route('foods.edit', $foods->id) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('foods.destroy', $foods->id) . '" method="post">
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
