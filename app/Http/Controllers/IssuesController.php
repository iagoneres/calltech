<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\IssueService;
use App\Validators\IssueValidator;

/**
 * Class IssuesController.
 *
 * @package namespace App\Http\Controllers;
 */
class IssuesController extends AppController
{
    use CrudMethods;

    /**
     * @var IssueService
     */
    protected $service;

    /**
     * @var IssueValidator
     */
    protected $validator;

    /**
     * IssuesController constructor.
     *
     * @param IssueService $service
     * @param IssueValidator $validator
     */
    public function __construct(IssueService $service, IssueValidator $validator)
    {
        $this->service      = $service;
        $this->validator    = $validator;
    }

}
