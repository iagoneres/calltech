<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;
use App\Repositories\UserRepository;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }

    /**
     * @var UserRepository $repository
     */
    protected $repository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
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