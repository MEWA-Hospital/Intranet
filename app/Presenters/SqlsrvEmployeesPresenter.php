<?php

namespace App\Presenters;

use App\Transformers\SqlsrvEmployeesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SqlsrvEmployeesPresenter.
 *
 * @package namespace App\Presenters;
 */
class SqlsrvEmployeesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SqlsrvEmployeesTransformer();
    }
}
