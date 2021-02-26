<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CashFlow;
use App\Models\Investment;
use App\Services\CashFlowService;
use Illuminate\Http\Request;

/**
 * handle cash flow routing
 */
class CashFlowController extends Controller
{
    /**
     * a cash flow service instance
     *
     * @var CashFlowService $cashFlowService
     */
    private $cashFlowService;

    public function __construct(CashFlowService $cfs)
    {
        $this->cashFlowService = $cfs;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Investment $cashFlow)
    {
        return $this->cashFlowService->show($cashFlow);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashFlow $cash_flow)
    {
        return $this->cashFlowService->update($cash_flow, $request);
    }
}
