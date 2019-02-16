<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Repositories;

use App\Interfaces\DocumentRepository;
use App\Models\Document;
use App\Presenters\DocumentPresenter;
use App\Validators\DocumentValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Ramsey\Uuid\Uuid;

/**
 * Class DocumentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Document::class;
    }

    public function presenter()
    {
        return DocumentPresenter::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /** Generates uuid version 4
     * @return string
     */
    public function generateUniqueIdentifier()
    {
        try {
            return Uuid::uuid4();

        } catch (\Exception $e) {
            $e->getMessage();
        };
    }

}
