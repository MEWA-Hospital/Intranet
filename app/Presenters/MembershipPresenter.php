<?php

namespace App\Presenters;

use App\Transformers\MembershipTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MembershipPresenter.
 *
 * @package namespace App\Presenters;
 */
class MembershipPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MembershipTransformer();
    }
}
