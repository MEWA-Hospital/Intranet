<?php

namespace App\Presenters;

use App\Transformers\BiometricShiftTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BiometricShiftPresenter.
 *
 * @package namespace App\Presenters;
 */
class BiometricShiftPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BiometricShiftTransformer();
    }
}
