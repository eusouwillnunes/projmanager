<?php
/**
 * Created by PhpStorm.
 * User: willn
 * Date: 02/09/2016
 * Time: 12:10
 */

namespace ProjManager\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use ProjManager\Entities\Project;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model()
    {
        return Project::class;
    }
}