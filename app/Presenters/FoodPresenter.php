<?php

namespace App\Presenters;

use App\Transformers\FoodTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FoodPresenter.
 *
 * @package namespace App\Presenters;
 */
class FoodPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FoodTransformer();
    }
}
