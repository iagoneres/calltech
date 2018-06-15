<?php

namespace App\Services;

use App\Repositories\SkillRepository;
use App\Services\Traits\CrudMethods;
use App\Repositories\ProfileRepository;

/**
 * Class ProfileService
 *
 * @package App\Services
 */
class ProfileService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }

    /**
     * @var ProfileRepository $repository
     */
    protected $repository;

    /**
     * ProfileService constructor.
     *
     * @param ProfileRepository $repository
     */
    public function __construct(ProfileRepository $repository)
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