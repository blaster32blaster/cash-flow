<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Fund;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

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
    public function show(Client $client, $obfuscated = false) : Response
    {
        $funds = $this->setFunds($client, $obfuscated);

        try {
            return response($funds);
        } catch (Exception $e) {
            logger()->error('error fetching clients', [
                'client_fetch_error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
        }
    }

    /**
     * set the funds to show
     *
     * @param Client $client
     * @param boolean $obfuscated
     * @return Collection
     */
    private function setFunds(Client $client, $obfuscated = false) : Collection
    {
        if (!$obfuscated) {
            return Fund::whereHas('investment', function ($q) use ($client) {
                $q->where('client_id', '=', $client->id);
            })
            ->get();
        }
        return $this->obfuscateFunds($client, Fund::all());
    }

    private function obfuscateFunds(Client $client, Collection $funds) : Collection
    {
        $responseCollect = collect();
        foreach ($funds as $fund) {
            if (!in_array($fund->type, json_decode($client->permission, TRUE))) {
                $fund->name = str_repeat("*", strlen($fund->name));
                $fund->type = str_repeat("*", strlen($fund->type));
                $fund->inception_date = str_repeat("*", strlen($fund->inception_date));
                $fund->description = str_repeat("*", strlen($fund->description));
                $responseCollect->push($fund);
                continue;
            }
            $responseCollect->push($fund);
        }
        return $responseCollect;
    }
}
