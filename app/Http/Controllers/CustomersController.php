<?php

namespace App\Http\Controllers;

use app\Http\Controllers\Traits\CrudMethods;
use App\Services\CustomerService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Repositories\CustomerRepository;
use App\Validators\CustomerValidator;

/**
 * Class CustomersController.
 *
 * @package namespace App\Http\Controllers;
 */
class CustomersController extends AppController
{
    use CrudMethods;

    /**
     * @var CustomerService
     */
    protected $service;

    /**
     * @var CustomerValidator
     */
    protected $validator;

    /**
     * CustomersController constructor.
     *
     * @param CustomerService $service
     * @param CustomerValidator $validator
     */
    public function __construct(CustomerService $service, CustomerValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
