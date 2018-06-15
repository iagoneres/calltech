<?php

namespace App\Http\Controllers;

use app\Http\Controllers\Traits\CrudMethods;
use App\Repositories\AddressRepository;
use App\Services\AddressService;
use App\Validators\AddressValidator;
use Illuminate\Http\Request;

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
    public function __construct(AddressService $service, AddressValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }

}
