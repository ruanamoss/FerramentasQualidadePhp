<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    public function findClient($id)
    {
        return Client::find($id);
    }
}