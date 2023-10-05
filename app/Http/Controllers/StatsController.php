<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Tenant;
use Illuminate\Http\Response;
use Mollie\Api\Types\PaymentStatus;

class StatsController extends Controller
{
    public function showTenant(Tenant $tenant): Response
    {
        $transactions = $tenant->transactions->where('mollie_status', PaymentStatus::STATUS_PAID)->get();

        return response(
            view('stats.view', [
                'centsCharged' => $transactions->pluck('cents_charged')->sum(),
                'gramsOfCo2' => $transactions->pluck('grams_of_co2')->sum(),
            ])->render()
        )->header('Content-Type', 'image/svg+xml');
    }

    public function showAccount(Account $account): Response
    {
        $transactions = $account->transactions->where('mollie_status', PaymentStatus::STATUS_PAID)->get();

        return response(
            view('stats.view', [
                'centsCharged' => $transactions->pluck('cents_charged')->sum(),
                'gramsOfCo2' => $transactions->pluck('grams_of_co2')->sum(),
            ])->render()
        )->header('Content-Type', 'image/svg+xml');
    }
}
