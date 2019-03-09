<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Domain\Department\Models\Employee;
use Yajra\DataTables\DataTables;

class PeopleController extends Controller
{
    public function dataTable()
    {

        $employees = Employee::with(['department', 'user', 'telephone', 'email']);

        return DataTables::of($employees)
            ->editColumn('name', function ($employee) {

                $user = $employee->user;

                if ($user) {

                    $profilePhoto = $user->firstMedia('profile-pictures') ?: $this->defaultProfilePicture();

                    return '  
                       <div class="media">
                                <div class="mr-3">
                                       <img src="' . asset($profilePhoto) . '" width="40"
                                             height="40" class="rounded-circle" alt="">
                                </div>
            
                                <div class="media-body align-self-center">' . $employee->name . '
                                    <div class="text-muted font-size-sm"> ' . $employee->designation . '
                                    </div>
                                </div>
                            </div>
                       ';
                } else {
                    return '  
                       <div class="media">
                                <div class="mr-3">
                                    <img src="' . asset($this->defaultProfilePicture()) . '" width="40"
                                     height="40" class="rounded-circle" alt="">
                                  </div>
            
                                <div class="media-body align-self-center">' . $employee->name . '
                                    <div class="text-muted font-size-sm"> ' . $employee->designation . '
                                    </div>
                                </div>
                            </div>
                       ';
                }
            })
            ->addColumn('action', function ($user) {
                return ' <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu7"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-user-tie"></i> Profile</a>
                               
                            </div>
                        </div>
                    </div>';
            })
            ->rawColumns(['action', 'name', 'telephone', 'email'])
            ->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('Frontend.people.index');
    }

    /**
     * @return string
     */
    public function defaultProfilePicture()
    {
        return 'global_assets/images/placeholders/placeholder.jpg';
    }
}
