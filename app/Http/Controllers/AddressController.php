<?php

namespace App\Http\Controllers;

use App\Repositories\AddressRepository;
use App\Validators\AddressValidator;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * @var AddressRepository
     */
    protected $repository;

    /**
     * @var AddressValidator
     */
    protected $validator;

    public function __construct(AddressRepository $repository, AddressValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $address = $this->repository->all();

        return $address;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {

//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $user = $this->repository->create($request->all());

            $response = [
                'message' => 'Addresses created.',
                'data'    => $user->toArray(),
            ];

            return response()->json($response);

        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = $this->repository->find($id);
        return $address;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        try {

//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $address = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Address updated.',
                'data'    => $address->toArray(),
            ];

            return response()->json($response);

        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessage()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        } catch (\Exception $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return response()->json([
            'message' => 'Address deleted.',
            'deleted' => $deleted,
        ]);
    }

}
