<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\BankAccount;

/**
 * Class BankAccountTransformer.
 *
 * @package namespace App\Transformers;
 */
class BankAccountTransformer extends TransformerAbstract
{
    /**
     * Transform the BankAccount entity.
     *
     * @param \App\Entities\BankAccount $model
     *
     * @return array
     */
    public function transform(BankAccount $model)
    {
        return [
            'id'            => (int) $model->id,

            'name'          => $model->name,
            'agency'        => $model->agency,
            'agency_digit'  => $model->agency_digit,
            'account'       => $model->account,
            'account_digit' => $model->account_digit,
            'owner_name'    => $model->owner_name,
            'user_id'       => $model->user_id,

            'created_at'    => $model->created_at->toDateTimeString(),
            'updated_at'    => $model->updated_at->toDateTimeString()
        ];
    }
}
