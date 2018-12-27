<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ExtensionRepository.
 *
 * @package namespace App\Interfaces;
 */
interface ExtensionRepository extends RepositoryInterface
{
    /**
     * Fetches dataTable records of specified resource
     *
     * @return mixed
     */
    public function getDataTable();
}
