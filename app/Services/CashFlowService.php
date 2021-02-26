<?php

namespace App\Services;

use App\Models\CashFlow;
use App\Models\Investment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * handle cash flows
 */
class CashFlowService
{
    /**
     * handle cash flow show method
     *
     * @return Response the specified cash flow
     */
    public function show(Investment $investment) : Response
    {
        try {
            $cashFlow = CashFlow::where('investment_id', '=', $investment->id)
                ->first();
            return response($cashFlow);
        } catch (Exception $e) {
            logger()->error('error fetching cash flow', [
                'cash_flow_fetch_error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
        }
    }

    public function update(CashFlow $cashFlow, Request $request)
    {
        try {
            $cashFlow = CashFlow::find($cashFlow->id);
            $cashFlow->return = $request->get('theReturn');
            return response($cashFlow->save());
        } catch (Exception $e) {
            logger()->error('error saving cash flow', [
                'cash_flow_save_error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
        }
    }
}
