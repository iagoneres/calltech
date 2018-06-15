<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Proposal;

/**
 * Class ProposalTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProposalTransformer extends TransformerAbstract
{
    /**
     * Transform the Proposal entity.
     *
     * @param \App\Entities\Proposal $model
     *
     * @return array
     */
    public function transform(Proposal $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
