<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TicketRepository;
use App\Entities\Ticket;
use App\Validators\TicketValidator;

/**
 * Class TicketRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TicketRepositoryEloquent extends BaseRepository implements TicketRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ticket::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TicketValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
