<?php

namespace App\Presenters;

use App\Transformers\ExtensionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ExtensionPresenter.
 *
 * @package namespace App\Presenters;
 */
class ExtensionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ExtensionTransformer();
    }
}
