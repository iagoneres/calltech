<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Address;

/**
 * Class AddressTransformer.
 *
 * @package namespace App\Transformers;
 */
class AddressTransformer extends TransformerAbstract
{
    /**
     * Transform the Address entity.
     *
     * @param \App\Entities\Address $model
     *
     * @return array
     */
    public function transform(Address $model)
    {
        return [
            'id'            => (int) $model->id,

            'postal_code'   => $model->postal_code,
            'street'        => $model->street,
            'number'        => $model->number,
            'neighborhood'  => $model->neighborhood,
            'city'          => $model->city,
            'state'         => $model->state,
            'country'       => $model->country,
            'complement'    => $model->complement,
            'user_id'       => $model->user_id,

            'created_at'    => $model->created_at->toDateTimeString(),
            'updated_at'    => $model->updated_at->toDateTimeString()
        ];
    }
}
