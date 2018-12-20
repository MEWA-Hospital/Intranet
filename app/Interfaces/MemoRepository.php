<?php

namespace App\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface MemoRepository.
 *
 * @package namespace App\Interfaces;
 */
interface MemoRepository extends RepositoryInterface
{
    public function getDataTable();
}
