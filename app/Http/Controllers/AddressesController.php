<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\AddressService;
use App\Validators\AddressValidator;

/**
 * Class AddressesController
 * @package App\Http\Controllers
 */
class AddressesController extends AppController
{
    use CrudMethods;

    /**
     * @var AddressService
     */
    protected $service;

    /**
     * @var AddressValidator
     */
    protected $validator;

    /**
     * AddressesController constructor.
     *
     * @param AddressService $service
     * @param AddressValidator $validator
     */
    public function __construct(AddressService $service,
                                AddressValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }

    /**
     * @param $cep
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findByCep($cep)
    {
        return $this->service->findByCep($cep);
    }

}
