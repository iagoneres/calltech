<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use App\Validators\ProfileValidator;
use app\Http\Controllers\Traits\CrudMethods;

/**
 * Class ProfilesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProfilesController extends AppController
{
    use CrudMethods;

    /**
     * @var ProfileService
     */
    protected $service;

    /**
     * @var ProfileValidator
     */
    protected $validator;

    /**
     * ProfilesController constructor.
     *
     * @param ProfileService $service
     * @param ProfileValidator $validator
     */
    public function __construct(ProfileService $service,
                                ProfileValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
