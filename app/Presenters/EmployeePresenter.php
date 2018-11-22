<?php

namespace App\Presenters;

use App\Transformers\EmployeeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmployeePresenter.
 *
 * @package namespace App\Presenters;
 */
class EmployeePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EmployeeTransformer();
    }
}
