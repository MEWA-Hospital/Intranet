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
use App\Interfaces\BankBranchRepository;
use App\Models\BankBranch;
use App\Validators\BankBranchValidator;

/**
 * Class BankBranchRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BankBranchRepositoryEloquent extends BaseRepository implements BankBranchRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BankBranch::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
