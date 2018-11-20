<?php

namespace App\Presenters;

use App\Transformers\EmployeeEmailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmployeeEmailPresenter.
 *
 * @package namespace App\Presenters;
 */
class EmployeeEmailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EmployeeEmailTransformer();
    }
}
