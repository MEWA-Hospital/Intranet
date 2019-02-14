<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Repositories;

use App\Models\Department;
use Prettus\Repository\Exceptions\RepositoryException;
use Yajra\DataTables\DataTables;
use App\Traits\CacheableRepository;
use App\Interfaces\DepartmentRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class DepartmentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DepartmentRepositoryEloquent extends BaseRepository implements DepartmentRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Department::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     *  fetch the dataTable records of all departments
     * @return mixed
     * @throws \Exception
     */
    public function getDataTable()
    {
        $departments = $this->model->with('employees');

        return DataTables::of($departments)
            ->addColumn('members_count', function ($department) {
                return $department->employeesCount();
            })
            ->addColumn('action', function ($department) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu3"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						<a href="' . route('admin.departments.show', $department->id) . '" class="dropdown-item"><i class="icon-eye"></i> View</a>
						<a href="' . route('admin.departments.edit', $department->id) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('admin.departments.destroy', $department->id) . '" method="post">
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
