<?php

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
