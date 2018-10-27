<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\MembershipRepository;
use App\Models\Membership;
use App\Validators\MembershipValidator;

/**
 * Class MembershipRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MembershipRepositoryEloquent extends BaseRepository implements MembershipRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Membership::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MembershipValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
