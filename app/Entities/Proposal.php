<?php

namespace App\Entities;

/**
 * Class Proposal.
 *
 * @package namespace App\Entities;
 */
class Proposal extends AppModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id',
        'issue_id',
        'status',
        'value'
    ];

    /**
     * The attributes of date type.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
