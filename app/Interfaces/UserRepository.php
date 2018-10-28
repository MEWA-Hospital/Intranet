<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Interfaces;
 */
interface UserRepository extends RepositoryInterface
{
    public function getDataTable();
}
