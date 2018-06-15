<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;

class UsersController extends AppController
{

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
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
        $users = $this->repository->all();

        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $data = [
                'name'      => $request->get('name'),
                'cpf_cnpj'  => $request->get('cpf_cnpj'),
                'email'     => $request->get('email'),
                'birthdate' => $request->get('birthdate'),
                'password'  => bcrypt($request->get('password')),
                'gender'    => $request->get('gender'),
                'type'      => $request->get('type')
            ];

            $user = $this->repository->create($data);

            $response = array_merge(['message' => 'User created.'], $user);

            return $response;

        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
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
        $user = $this->repository->find($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $user = $this->repository->update($request->all(), $id);
            $response = array_merge(['message' => 'User updated.'], $user);

            return $response;
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
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
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
    }

    /**
     *  Logoff user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revokeToken(Request $request)
    {
        try {
            $user = User::find($request->get('user_id'));
            $userTokens = $user->tokens()->get();

            foreach ($userTokens as $token) {
                $token->revoke();
            }

            return response()->json([
                'error'   => false,
                'message' => 'Usuário deslogado com sucesso.'
            ]);

        } catch(\Exception $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Retorna o usuário autenticado
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function authenticatedUser()
    {
        return Auth::user();
    }
}
