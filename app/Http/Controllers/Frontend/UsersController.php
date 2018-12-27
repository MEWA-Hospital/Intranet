<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    public function dataTable()
    {
//        $e = \DB::connection('contract')->table('Employees')->select('*')->get();
//        $active = $e->filter(function ($employee) {
//            return $employee->Emp_Inactive == 0 && $employee->Emp_DepartmentID != 'MEWA.75' && $employee->Emp_DepartmentID != 'MEWA.74' && $employee->Emp_SeparationID == null;
//        });

        $employees = Employee::with(['department', 'user', 'telephone']);

        return DataTables::of($employees)
            ->editColumn('name', function ($employee) {

                $user = $employee->user;

                if ($user) {

                    $profilePhoto = $user->getFirstMediaUrl('profile-pictures') ?: $this->defaultProfilePicture();

                    return '  
                       <div class="media">
                                <div class="mr-3">
                                       <img src="' . asset($profilePhoto) . '" width="40"
                                             height="40" class="rounded-circle" alt="">
                                </div>
            
                                <div class="media-body align-self-center">
                                    <a href="" class="font-weight-semibold"> ' . $employee->name . '</a>
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
            
                                <div class="media-body align-self-center">
                                    <a href="" class="font-weight-semibold"> ' . $employee->name . '</a>
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
            ->rawColumns(['action', 'name', 'telephone'])
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
