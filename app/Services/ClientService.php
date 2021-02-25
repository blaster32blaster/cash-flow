<?php

namespace App\Services;

use App\Models\Client;
use Exception;
use Illuminate\Http\Response;

/**
 * handle clients
 */
class ClientService
{
    /**
     * handle client index method
     *
     * @return Response all the clients
     */
    public function index() : Response
    {
        try {
            return response(Client::all());
        } catch (Exception $e) {
            logger()->error('error fetching clients', [
                'client_fetch_error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
        }
    }
}
