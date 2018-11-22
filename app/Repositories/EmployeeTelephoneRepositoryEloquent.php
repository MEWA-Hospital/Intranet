<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\EmployeeTelephoneRepository;
use App\Models\EmployeeTelephone;
use App\Validators\EmployeeTelephoneValidator;

/**
 * Class EmployeeTelephoneRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmployeeTelephoneRepositoryEloquent extends BaseRepository implements EmployeeTelephoneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmployeeTelephone::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
