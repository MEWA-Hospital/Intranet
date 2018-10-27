<?php

namespace App\Presenters;

use App\Transformers\DepartmentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DepartmentPresenter.
 *
 * @package namespace App\Presenters;
 */
class DepartmentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DepartmentTransformer();
    }
}
