<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\InvestmentService;
use Illuminate\Http\Request;

class InvestmentNamesController extends Controller
{
    /**
     * an investment service instance
     *
     * @var InvestmentService $investmentService
     */
    private $investmentService;

    public function __construct(InvestmentService $is)
    {
        $this->investmentService = $is;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $investment_name)
    {
        return $this->investmentService->show($investment_name);
    }
}
