<?php

namespace App\Presenters;

use App\Transformers\EmployeeTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmployeeTypePresenter.
 *
 * @package namespace App\Presenters;
 */
class EmployeeTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EmployeeTypeTransformer();
    }
}
