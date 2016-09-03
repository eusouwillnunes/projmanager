<?php
/**
 * Created by PhpStorm.
 * User: willn
 * Date: 25/07/2016
 * Time: 20:24
 */

namespace ProjManager\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;
use ProjManager\Repositories\ClientRepository;
use ProjManager\Validators\ClientValidator;

class ClientService
{
    /**
     * @var ClientRepository
     */
    protected $repository;
    /**
     * @var ClientValidator
     */
    private $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function show($id){
        try{
            //Validação de Procura
            $this->repository->skipPresenter()->find($id);
            return $this->repository->find($id);
        }catch (ModelNotFoundException $e){
            return [
                'error' => true,
                'message' => 'Cliente não encontrado.'
            ];
        }
    }

    /**
     * Método Utilizado para Criar registros no banco de dados, executando validação.
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * Método Utilizado para Atualizar registros no banco de dados, executando validação.
     * @param array $data
     * @param $id
     * @return array|mixed
     */
    public function update(array $data, $id)
    {

        try {
            $this->validator->with($data)->passesOrFail();
            $this->repository->skipPresenter()->find($id);
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        } catch (ModelNotFoundException $e){
            return [
                'error' => true,
                'message' => 'Cliente não encontrado.'
            ];
        }
    }

    public function delete($id)
    {
        //Verificar a função do método skipPresenter
        try {
            $this->repository->skipPresenter()->find($id)->delete();
            return [
                'success' => true,
                'message' => 'Registro Apagado com Sucesso.'
            ];
        } catch (QueryException $e) {
            return [
                'error' => true,
                'message' => 'Cliente não pode ser apagado pois existe um ou mais projetos vinculados a ele.'
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'Cliente não encontrado.'
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => 'Ocorreu um erro ao excluir o cliente.'
            ];
        }


    }


}