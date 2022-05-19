<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $client = Client::create($request->all());
            return Response($client, 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception ($e, 500);
        }
    }
}
