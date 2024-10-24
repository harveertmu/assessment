<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PaymentProviderRequestController;
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
Route::post('/events', [EventController::class, 'store']);


// Route::post('/payment-methods', [PaymentMethodController::class, 'store']);
// Route::post('/companies', [CompanyController::class, 'store']);
// Route::get('/payment-provider-requests', [PaymentProviderRequestController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


 