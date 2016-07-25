<?php

namespace ProjManager\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use ProjManager\Entities\Client;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }
}