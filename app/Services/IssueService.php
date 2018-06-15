<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;
use App\Repositories\IssueRepository;

/**
 * Class IssueService
 *
 * @package App\Services
 */
class IssueService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }

    /**
     * @var IssueRepository $repository
     */
    protected $repository;

    /**
     * IssueService constructor.
     *
     * @param IssueRepository $repository
     */
    public function __construct(IssueRepository $repository)
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