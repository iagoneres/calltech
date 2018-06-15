<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;
use App\Repositories\AddressRepository;
use GuzzleHttp\Client;


/**
 * Class AddressService
 *
 * @package App\Services
 */
class AddressService extends AppService
{
    use CrudMethods {
        all as public processAll;
    }

    /**
     * @var AddressRepository $repository
     */
    protected $repository;

    /**
     * @var Client
     */
    private $client;

    /**
     * AddressService constructor.
     *
     * @param AddressRepository $repository
     * @param Client $client
     */
    public function __construct(AddressRepository $repository,
                                Client $client)
    {
        $this->repository = $repository;
        $this->client = $client;
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

    /**
     * Find address by cep
     * @param $cep
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findByCep($cep)
    {
        try{
            if (empty($cep) or is_null($cep)){
                throw new \Exception('Cep inválido!');
            } else {
                $url = 'https://viacep.com.br/ws/';
                $cep = preg_replace("/[.\/-]/", '', $cep);
                $res = $this->client->request('GET', $url.$cep . '/json/');
                $json = json_decode($res->getBody(), true);

                return $json;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 401);
        }
    }

}