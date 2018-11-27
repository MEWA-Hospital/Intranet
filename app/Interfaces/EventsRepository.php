<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface EventsRepository.
 *
 * @package namespace App\Interfaces;
 */
interface EventsRepository extends RepositoryInterface
{

    /**
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     */
    public function getDataTable();
}
