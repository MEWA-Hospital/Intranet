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
    public function getDataTable();
}
