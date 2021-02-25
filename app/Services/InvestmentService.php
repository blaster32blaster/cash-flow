<?php

namespace App\Services;

use App\Models\Client;
use Exception;
use Illuminate\Http\Response;

/**
 * handle investments
 */
class InvestmentService
{
    /**
     * handle investment show method
     *
     * @return Response all the clients investments
     */
    public function show(Client $client) : Response
    {
        try {
            return response($client->investments);
        } catch (Exception $e) {
            logger()->error('error fetching clients', [
                'client_fetch_error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
        }
    }
}
