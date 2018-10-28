<?php
/**
 * Project: MEWA Hospital Intranet
 * Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 * Last Modified: 10/27/18 4:20 PM.
 *
 * Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
 * (https://opensource.org/licenses/AGPL-3.0).
 */

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\DepartmentRepository;
use App\Models\Department;
use App\Validators\DepartmentValidator;

/**
 * Class DepartmentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DepartmentRepositoryEloquent extends BaseRepository implements DepartmentRepository
{
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
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DepartmentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
