<?php
/**
 * Created by PhpStorm.
 * User: willn
 * Date: 02/09/2016
 * Time: 12:17
 */

namespace ProjManager\Services;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;
use ProjManager\Repositories\ProjectRepository;
use ProjManager\Validators\ProjectValidator;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectValidator
     */
    private $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

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

    public function show($id){
        try{
            //Validação de Procura
            $this->repository->skipPresenter()->find($id);
            return $this->repository->find($id);
        }catch (ModelNotFoundException $e){
            return [
                'error' => true,
                'message' => 'Projeto não encontrado.'
            ];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            //Validação de Procura
            $this->repository->skipPresenter()->find($id);
            $this->repository->update($data, $id);
            return $this->repository->find($id);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }catch (ModelNotFoundException $e){
            return [
                'error' => true,
                'message' => 'Projeto não encontrado.'
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
                'message' => 'Projeto não pode ser apagado pois existe um ou mais projetos vinculados a ele.'
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'Projeto não encontrado.'
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => 'Ocorreu um erro ao excluir o Projeto.'
            ];
        }
    }



}