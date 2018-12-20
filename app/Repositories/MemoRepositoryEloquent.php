<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\MemoRepository;
use App\Models\Memo;
use App\Validators\MemoValidator;
use Yajra\DataTables\DataTables;

/**
 * Class MemoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MemoRepositoryEloquent extends BaseRepository implements MemoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Memo::class;
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
        $memos = $this->model->with('department')->latest();
        return DataTables::of($memos)
            ->addColumn('action', function ($memo) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						<a href="' . route('admin.memos.edit', $memo->id) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('admin.memos.destroy', $memo->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . '
						<button type="submit" class="dropdown-item" onclick="return confirm(\'Are you sure you want to delete? \')"><i class="icon-trash"></i> Delete</button>
						</form>
						</div>
						</div>
						</div>';
            })
            ->rawColumns(['department', 'action'])
            ->make(true);
    }

}
