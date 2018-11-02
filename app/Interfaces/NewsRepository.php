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
    public function getDataTable();
}
