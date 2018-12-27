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

use App\Interfaces\UserRepository;
use App\Models\User;
use Laravolt\Avatar\Facade as Avatar;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Yajra\DataTables\DataTables;

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
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     * @throws \Exception
     */
    public function getDataTable()
    {
        $users = $this->model->with(['employee.department']);

        return DataTables::of($users)
            ->editColumn('username', function ($user) {
                return ' <td>
                            <div class="d-flex align-items-center">
								<div class="mr-3">
									<a href="#" class="btn rounded-round btn-icon btn-sm">
							    		' . Avatar::create($user->username)->toSvg() . '
									</a>
								</div>
								<div>
									<a href="#" class="text-default font-weight-semibold letter-icon-title"> ' . $user->username . '</a>
										<div class="text-muted font-size-sm"><i class="icon-mailbox"></i> ' . $user->email . '</div>
										</div>
								</div>
							</td>';
            })
            ->editColumn('isActive', function ($user) {
                if ($user->isActive == 0) {
                    return '<span class="badge badge-danger">Inactive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }
            })
            ->addColumn('action', function ($user) {
                return ' <div class="list-icons">
					       <a href="' . route('admin.users.edit', $user->id) . '" class="list-icons-item text-primary-600"><i class="icon-pencil7"></i></a>
					       <form action="' . route('admin.users.destroy', $user->id) . '" method="post">
						' . method_field('DELETE') . '
						' . csrf_field() . '
					       <button type="submit" onclick="return confirm(\'Are you sure you want to delete? \')" class="btn bg-transparent list-icons-item text-danger-600"><i class="icon-trash"></i></button>
					       </form>
					       <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu7"></i></a>
                            
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="' . route('profile.index', $user->username) . ' " target="_blank" class="dropdown-item"><i class="icon-user-tie"></i> Profile</a>
                                <a href="' . route('admin.users.show-activate-form', $user->id) . '" class="dropdown-item"><i class="icon-check"></i> Activate Account</a>
                            </div>
                        </div>
                    </div>';
            })
            ->rawColumns(['isActive', 'username', 'action'])
            ->make(true);
    }

}
