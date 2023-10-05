<?php

use App\Http\Controllers\PaymentController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::post('/transactions/store', [PaymentController::class, 'store'])->name('transactions.store');
Route::get('/transactions/create', [PaymentController::class, 'create'])->name('transactions.create');
Route::get('/transactions/success', [PaymentController::class, 'success'])->name('transactions.redirect');
Route::post('/transactions/webhook', [PaymentController::class, 'webhook'])->name('transactions.webhook');

Route::get('/stats/{tenant}', static function (Tenant $tenant) {
    return response(
        view('stats.view', [
            'tenant' => $tenant,
            'centsCharged' => $tenant->transactions->pluck('cents_charged')->sum(),
            'gramsOfCo2' => $tenant->transactions->pluck('grams_of_co2')->sum(),
        ])->render()
    )->header('Content-Type', 'image/svg+xml');
});
