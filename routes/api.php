<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('clients', App\Http\Controllers\Api\ClientsController::class)
    ->only('index');

Route::resource('investment-types', App\Http\Controllers\Api\InvestmentTypesController::class)
    ->only('show');

Route::resource('investment-names', App\Http\Controllers\Api\InvestmentNamesController::class)
    ->only('show');

Route::resource('cash-flow', App\Http\Controllers\Api\CashFlowController::class)
    ->only('show', 'update');
