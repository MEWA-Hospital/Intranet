<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\BiometricInOutDetailsRepository;
use App\Models\BiometricInOutDetails;
use App\Validators\BiometricInOutDetailsValidator;

/**
 * Class BiometricInOutDetailsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BiometricInOutDetailsRepositoryEloquent extends BaseRepository implements BiometricInOutDetailsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BiometricInOutDetails::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
