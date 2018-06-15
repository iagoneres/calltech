<?php

namespace App\Entities;

/**
 * Class Issue.
 *
 * @package namespace App\Entities;
 */
class Issue extends AppModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'title',
        'category',
        'level',
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
