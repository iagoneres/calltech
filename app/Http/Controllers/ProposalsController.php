<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\ProposalService;
use App\Validators\ProposalValidator;

/**
 * Class ProposalsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProposalsController extends AppController
{
    use CrudMethods;

    /**
     * @var ProposalService
     */
    protected $service;

    /**
     * @var ProposalValidator
     */
    protected $validator;

    /**
     * ProposalsController constructor.
     *
     * @param ProposalService $service
     * @param ProposalValidator $validator
     */
    public function __construct(ProposalService $service, ProposalValidator $validator)
    {
        $this->service      = $service;
        $this->validator    = $validator;
    }

}