<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\GastoController;

Route::get('/ingresos', [IngresoController::class, 'index']);
Route::post('/ingresos', [IngresoController::class, 'store']);

Route::get('/gastos', [GastoController::class, 'index']);
Route::post('/gastos', [GastoController::class, 'store']);

Route::delete('/ingresos/{id}', [IngresoController::class, 'destroy']);
Route::delete('gastos/{id}', 'App\Http\Controllers\GastoController@destroy');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
