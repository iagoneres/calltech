<?php

namespace App\Presenters;

use App\Transformers\ProposalTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProposalPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProposalPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProposalTransformer();
    }
}
