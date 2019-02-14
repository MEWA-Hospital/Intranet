<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\EmployeeEmailRepository;
use App\Models\EmployeeEmail;
use App\Validators\EmployeeEmailValidator;

/**
 * Class EmployeeEmailRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmployeeEmailRepositoryEloquent extends BaseRepository implements EmployeeEmailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmployeeEmail::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
