<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Fund;
use Exception;
use Illuminate\Http\Response;

/**
 * handle funds
 */
class FundService
{
    /**
     * handle fund show method
     *
     * @return Response all the clients fund types
     */
    public function show(Client $client) : Response
    {
        $funds = Fund::whereHas('investment', function ($q) use ($client) {
            $q->where('client_id', '=', $client->id);
        })
        ->get();
        try {
            return response($funds);
        } catch (Exception $e) {
            logger()->error('error fetching clients', [
                'client_fetch_error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
        }
    }
}
