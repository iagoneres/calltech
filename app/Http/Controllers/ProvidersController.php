<?php

namespace App\Http\Controllers;

use App\Services\ProviderService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProviderCreateRequest;
use App\Http\Requests\ProviderUpdateRequest;
use App\Repositories\ProviderRepository;
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
