<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    /**
     * a client service instance
     *
     * @var ClientService $clientService
     */
    private $clientService;

    public function __construct(ClientService $cs)
    {
        $this->clientService = $cs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->clientService->index();
    }
}
