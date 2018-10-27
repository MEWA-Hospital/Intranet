<?php

namespace App\Presenters;

use App\Transformers\BranchTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BranchPresenter.
 *
 * @package namespace App\Presenters;
 */
class BranchPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BranchTransformer();
    }
}
