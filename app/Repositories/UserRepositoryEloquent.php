<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/28/18 7:39 PM.
 *
 * Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
 */

namespace App\Repositories;

use App\Models\User;
use Yajra\DataTables\DataTables;
use App\Presenters\UserPresenter;
use App\Interfaces\UserRepository;
use Laravolt\Avatar\Facade as Avatar;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Specify Presenter
     *
     * @return string
     */
    public function presenter()
    {
        return UserPresenter::class;
    }

    /**
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     * @throws \Exception
     */
    public function getDataTable()
    {
        $users = $this->model->with(['department']);

        return DataTables::of($users)
            ->editColumn('first_name', function ($user) {
                return ' <td> 
                            <div class="d-flex align-items-center">
								<div class="mr-3">
									<a href="#" class="btn rounded-round btn-icon btn-sm">
							    		'. Avatar::create($user->first_name)->toSvg() .'
									</a>
								</div>
								<div>
									<a href="#" class="text-default font-weight-semibold letter-icon-title"> ' . $user->first_name . ' ' . $user->last_name . '</a>
										<div class="text-muted font-size-sm"><i class="icon-mailbox"></i> ' . $user->email . '</div>
										</div>
								</div>
							</td>';
            })
            ->addColumn('action', function ($user) {
                return ' <div class="list-icons">
                            <div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
							<i class="icon-menu"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
						<a href="' . route('users.edit', $user->id) . '" class="dropdown-item"><i class="icon-pen"></i> Edit</a>
						<form action="' . route('users.destroy', $user->id) . '" method="post">
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
