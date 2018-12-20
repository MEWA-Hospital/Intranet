<?php

namespace App\Presenters;

use App\Transformers\MemoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MemoPresenter.
 *
 * @package namespace App\Presenters;
 */
class MemoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MemoTransformer();
    }
}
