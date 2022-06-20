<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        try {
            $client = Client::all();
            return response($client);
        } catch (\Exception) {
            throw new \Exception('Exception message');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        try {
            $client = Client::create($request->all());
            return Response($client, 201);
        } catch (\Exception $e) {
            throw new \Exception ($e, 500);
        }
    }
}
