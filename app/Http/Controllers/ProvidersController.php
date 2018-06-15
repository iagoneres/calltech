<?php

namespace App\Http\Controllers;

use App\Services\ProviderService;
use App\Validators\ProviderValidator;
use App\Http\Controllers\Traits\CrudMethods;

/**
 * Class ProvidersController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProvidersController extends AppController
{
    use CrudMethods;

    /**
     * @var ProviderService
     */
    protected $service;

    /**
     * @var ProviderValidator
     */
    protected $validator;

    /**
     * ProvidersController constructor.
     *
     * @param ProviderService $service
     * @param ProviderValidator $validator
     */
    public function __construct(ProviderService $service, ProviderValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
