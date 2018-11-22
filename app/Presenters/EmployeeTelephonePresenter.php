<?php

namespace App\Presenters;

use App\Transformers\EmployeeTelephoneTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmployeeTelephonePresenter.
 *
 * @package namespace App\Presenters;
 */
class EmployeeTelephonePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EmployeeTelephoneTransformer();
    }
}
