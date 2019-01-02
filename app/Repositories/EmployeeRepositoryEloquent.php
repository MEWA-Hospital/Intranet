<?php

namespace App\Repositories;

use App\Interfaces\EmployeeRepository;
use App\Models\Employee;
use App\Traits\CacheableRepository;
use App\Validators\EmployeeValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Yajra\DataTables\DataTables;

/**
 * Class EmployeeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmployeeRepositoryEloquent extends BaseRepository implements EmployeeRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Employee::class;
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
        $employees = $this->model->with(['department', 'email', 'type']);

        return DataTables::of($employees)

            ->addColumn('action', function ($employee) {
                return ' <div class="list-icons">
					       <a href="' . route('admin.employees.edit', $employee->id) . '" class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
					       <form action="' . route('admin.employees.destroy', $employee->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . '
					       <button type="submit" onclick="return confirm(\'Are you sure you want to delete? \')" class="btn bg-transparent list-icons-item text-danger-600"><i class="icon-trash"></i></button>
					       </form>
					       <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu7"></i></a>
                            
                            <div class="dropdown-menu dropdown-menu-right">
                                 <a href="' . route('admin.users.show-activate-form', $employee->id) . '" class="dropdown-item"><i class="icon-check"></i> Activate Account</a>
                            </div>
                        </div>
                    </div>';
            })
            ->make(true);
    }

}
