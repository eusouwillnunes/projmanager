<?php

namespace ProjManager\Http\Controllers;

use Illuminate\Http\Request;
use ProjManager\Repositories\ProjectNoteRepository;
use ProjManager\Services\ProjectNoteService;



class ProjectNotesController extends Controller
{

    /**
     * @var ProjectNoteRepository
     */
    protected $repository;

    /**
     * @var ProjectNoteService
     */
    private $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param  int $noteId
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, $noteId)
    {
        return $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $noteId
     *
     * @return Response
     */
    public function update(Request $request, $noteId)
    {

        return $this->service->update($request->all(), $noteId);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $noteId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($noteId)
    {
        return $this->service->delete($noteId);
    }
}
