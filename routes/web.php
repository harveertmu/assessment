<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\EventPaymentController;
use App\Http\Controllers\PaymentProviderRequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    $user = auth()->user();
    if ($user->hasRole('Admin')) {
        // If user is an admin, return the admin dashboard view
        return view('dashboard');
    }
    if ( $user->hasRole('Finance')) {
        // If user is an admin, return the admin dashboard view
        return redirect()->route('finance.index');  
     
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'finance']], function () {
    Route::get('/finance/payment-provider', action: [EventPaymentController::class, 'index'])->name('finance.payment_provider');

    Route::get('/finance/event-payment/create', [EventPaymentController::class, 'create'])->name('event-payment.create');
    Route::post('/finance/event-payment', [EventPaymentController::class, 'store'])->name('event-payment.store');
    Route::get('/finance/event-payment/{id}/edit', [EventPaymentController::class, 'edit'])->name('event-payment.edit');
    Route::put('/finance/event-payment/{id}', [EventPaymentController::class, 'update'])->name('event-payment.update');


    Route::get('event', [FinanceController::class, 'create'])->name('events.create');

    Route::post('event', [FinanceController::class, 'store'])->name('events.store');
    Route::get('/finance', action: [FinanceController::class, 'index'])->name('finance.index');
    Route::get('/finance/edit/{event}', [FinanceController::class, 'editPayment'])->name('finance.edit_payment');
    Route::put('/finance/update/{event}', [FinanceController::class, 'updatePayment'])->name('finance.updatePayment');
    Route::get('/finance/request-payment-provider', [FinanceController::class, 'requestPaymentProvider'])->name('request-payment-provider');
    Route::post('/finance/store-payment-provider-request', [FinanceController::class, 'storePaymentProviderRequest'])->name('store-payment-provider-request');



    Route::get('/finance/payment-provider-edit/{event}', [PaymentProviderRequestController::class, 'show'])->name('finance.edit_payment_provider');
    Route::put('/finance/payment-provider-update/{event}', [PaymentProviderRequestController::class, 'updateStatus'])->name('payment-provider-request.updateStatus');
});
require __DIR__ . '/auth.php';
