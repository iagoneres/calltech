<?php

namespace App\Http\Controllers;

use App\Services\SkillService;
use App\Validators\SkillValidator;

/**
 * Class SkillsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SkillsController extends AppController
{

    /**
     * @var SkillService
     */
    protected $service;

    /**
     * @var SkillValidator
     */
    protected $validator;

    /**
     * SkillsController constructor.
     *
     * @param SkillService $service
     * @param SkillValidator $validator
     */
    public function __construct(SkillService $service, SkillValidator $validator)
    {
        $this->service      = $service;
        $this->validator    = $validator;
    }

}
