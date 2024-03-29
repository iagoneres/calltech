<?php

namespace app\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Services\AppService;

/**
 * Class CrudMethods
 * @package app\Http\Controllers\Traits
 */
trait CrudMethods
{
    /** @var  AppService $service */
    protected $service;

    /** @var  ValidatorInterface $validator */
    protected $validator;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->query->get('limit', 15);
        return response()->json($this->service->all($limit));
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return response()->json($this->service->find($id));
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
        return $this->service->create($request->all());
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, int $id)
    {
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
        return $this->service->update($request->all(), $id);
    }

    /**
     * Softdeletes the specified resource from storage.
     *
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}