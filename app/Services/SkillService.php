<?php

namespace App\Services;

use App\Repositories\SkillRepository;
use App\Services\Traits\CrudMethods;
use App\Repositories\CustomerRepository;

/**
 * Class CustomerService
 *
 * @package App\Services
 */
class SkillService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }

    /**
     * @var SkillRepository $repository
     */
    protected $repository;

    /**
     * SkillService constructor.
     *
     * @param SkillRepository $repository
     */
    public function __construct(SkillRepository $repository)
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