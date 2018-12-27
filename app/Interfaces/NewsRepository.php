<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository.
 *
 * @package namespace App\Interfaces;
 */
interface NewsRepository extends RepositoryInterface
{
    /**
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     */
    public function getDataTable();
}
