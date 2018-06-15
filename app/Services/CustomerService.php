<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;
use App\Repositories\CustomerRepository;

/**
 * Class CustomerService
 *
 * @package App\Services
 */
class CustomerService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }

    /**
     * @var CustomerRepository $repository
     */
    protected $repository;

    /**
     * CustomerService constructor.
     *
     * @param CustomerRepository $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $limit
     * @return array|mixed
     */
    public function all($limit = 20)
    {
        $this->repository
            ->resetCriteria()
            ->pushCriteria(app('App\Criterias\AppRequestCriteria'));
        return $this->processAll($limit);
    }

}