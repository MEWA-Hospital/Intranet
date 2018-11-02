<?php

namespace App\Presenters;

use App\Transformers\NewsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NewsPresenter.
 *
 * @package namespace App\Presenters;
 */
class NewsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NewsTransformer();
    }
}
