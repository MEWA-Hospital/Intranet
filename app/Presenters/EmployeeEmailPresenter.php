<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Presenters;

use App\Transformers\EmployeeEmailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmployeeEmailPresenter.
 *
 * @package namespace App\Presenters;
 */
class EmployeeEmailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EmployeeEmailTransformer();
    }
}
