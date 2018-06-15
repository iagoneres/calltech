<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;
use App\Repositories\ProviderRepository;

/**
 * Class ProviderService
 *
 * @package App\Services
 */
class ProviderService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }

    /**
     * @var ProviderRepository $repository
     */
    protected $repository;

    /**
     * ProviderService constructor.
     *
     * @param ProviderRepository $repository
     */
    public function __construct(ProviderRepository $repository)
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