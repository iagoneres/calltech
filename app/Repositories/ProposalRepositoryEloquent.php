<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProposalRepository;
use App\Entities\Proposal;
use App\Validators\ProposalValidator;

/**
 * Class ProposalRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProposalRepositoryEloquent extends BaseRepository implements ProposalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Proposal::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProposalValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
