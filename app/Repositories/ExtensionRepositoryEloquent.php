<?php

namespace App\Repositories;

use App\Interfaces\ExtensionRepository;
use App\Models\Extension;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Yajra\DataTables\DataTables;

/**
 * Class ExtensionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ExtensionRepositoryEloquent extends BaseRepository implements ExtensionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Extension::class;
    }


    /**
     * Boot up the repository, pushing criteria
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
        $extensions = $this->model->with('employees', 'department');

        return DataTables::of($extensions)
            ->editColumn('employees', function ($extension) {

                $employeeNames = [];

                foreach ($extension->employees as $employee) {
                    $employeeNames[] = $employee->name;
                }

                return $employeeNames;
            })
            ->addColumn('action', function ($extension) {
                return ' <div class="list-icons">
					       <a href="' . route('admin.extensions.edit', $extension->id) . '" class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
					       <form action="' . route('admin.extensions.destroy', $extension->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . '
					       <button type="submit" onclick="return confirm(\'Are you sure you want to delete? \')" class="btn bg-transparent list-icons-item text-danger-600"><i class="icon-trash"></i></button>
					       </form>
					    </div>';
            })
            ->make(true);
    }
}
