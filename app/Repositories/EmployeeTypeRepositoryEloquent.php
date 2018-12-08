<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\EmployeeTypeRepository;
use App\Models\EmployeeType;
use App\Validators\EmployeeTypeValidator;

/**
 * Class EmployeeTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmployeeTypeRepositoryEloquent extends BaseRepository implements EmployeeTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmployeeType::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
