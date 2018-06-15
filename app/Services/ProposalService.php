<?php

namespace App\Services;

use App\Repositories\ProposalRepository;
use App\Services\Traits\CrudMethods;
use App\Repositories\CustomerRepository;

/**
 * Class CustomerService
 *
 * @package App\Services
 */
class ProposalService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }

    /**
     * @var ProposalRepository $repository
     */
    protected $repository;

    /**
     * ProposalService constructor.
     *
     * @param ProposalRepository $repository
     */
    public function __construct(ProposalRepository $repository)
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