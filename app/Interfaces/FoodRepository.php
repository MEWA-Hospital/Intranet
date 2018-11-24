<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface FoodRepository.
 *
 * @package namespace App\Interfaces;
 */
interface FoodRepository extends RepositoryInterface
{
    public function getDataTable();
}
