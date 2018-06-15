<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;
use App\Repositories\AddressRepository;

/**
 * Class AddressService
 *
 * @package App\Services
 */
class AddressService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }
    /**
     * @var AddressRepository $repository
     */
    protected $repository;

    /**
     * AddressService constructor.
     *
     * @param AddressRepository $repository
     */
    public function __construct(AddressRepository $repository)
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