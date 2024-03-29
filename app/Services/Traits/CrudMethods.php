<?php

namespace app\Services\Traits;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CrudMethods
 * @package app\Services\Traits
 */
trait CrudMethods
{
    /** @var  RepositoryInterface $repository */
    protected $repository;

    /**
     * @param int $limit
     * @return mixed
     */
    public function all(int $limit = 20)
    {
        return $this->repository->paginate($limit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function find($id, $skip_presenter = false)
    {
        if ($skip_presenter) {
            return $this->repository->skipPresenter()->find($id);
        }
        return $this->repository->find($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return array|mixed
     */
    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * @param array $data
     * @param bool $first
     * @param bool $presenter
     * @return mixed
     */
    public function findWhere(array $data, $first = false, $presenter = false)
    {
        if ($first) {
            return $this->repository->skipPresenter()->findWhere($data)->first();
        }
        if ($presenter) {
            return $this->repository->findWhere($data)->first();
        }
        return $this->repository->skipPresenter()->findWhere($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        $this->repository->delete($id);
        return ['error' => false];
    }
}