<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/companies', [\App\Http\Controllers\ApiV1\CompanyController::class, 'index']);
Route::get('/companies/{id}', [\App\Http\Controllers\ApiV1\CompanyController::class, 'selectById']);
Route::post('/companies', [\App\Http\Controllers\ApiV1\CompanyController::class, 'store']);
Route::post('/company/delete/{id}', [\App\Http\Controllers\ApiV1\CompanyController::class, 'destroy']);
Route::post('/company/update', [\App\Http\Controllers\ApiV1\CompanyController::class, 'update']);
