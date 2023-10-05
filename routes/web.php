<?php

use App\Http\Controllers\DonationsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StatsController;
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

Route::get('/transactions/{tenant}/start/{email}', [PaymentController::class, 'start'])->name('transactions.start');
Route::get('/transactions/{tenant}/{transaction}/success', [PaymentController::class, 'success'])->name('transactions.redirect');
Route::post('/transactions/webhook', [PaymentController::class, 'webhook'])->name('transactions.webhook');

Route::get('/stats/account/{account}', [StatsController::class, 'showAccount']);
Route::get('/stats/tenant/{tenant}', [StatsController::class, 'showTenant']);

Route::get('/compensate/{tenant}', [DonationsController::class, 'makeContribution']);
