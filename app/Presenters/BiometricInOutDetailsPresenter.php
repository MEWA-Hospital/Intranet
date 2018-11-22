<?php

namespace App\Presenters;

use App\Transformers\BiometricInOutDetailsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BiometricInOutDetailsPresenter.
 *
 * @package namespace App\Presenters;
 */
class BiometricInOutDetailsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BiometricInOutDetailsTransformer();
    }
}
