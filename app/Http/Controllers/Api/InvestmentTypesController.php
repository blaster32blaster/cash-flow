<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\FundService;
use Illuminate\Http\Request;

class InvestmentTypesController extends Controller
{
    /**
     * a fund service instance
     *
     * @var FundService $fundService
     */
    private $fundService;

    public function __construct(FundService $fs)
    {
        $this->fundService = $fs;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $investment_type)
    {
        $obfuscate = false;
        if (isset($_GET['obfuscated']) && $_GET['obfuscated']) {
            $obfuscate = true;
        }

        return $this->fundService->show($investment_type, $obfuscate);
    }
}
