<?php

namespace App\Presenters;

use App\Transformers\EventsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EventsPresenter.
 *
 * @package namespace App\Presenters;
 */
class EventsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EventsTransformer();
    }
}
