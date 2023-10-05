<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartPaymentRequest;
use App\Models\Account;
use App\Models\Tenant;
use App\Models\Transaction;
use App\Services\CO2CalculatorInterface;
use App\Services\PaymentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mollie\Api\Types\PaymentStatus;
use Mollie\Laravel\Facades\Mollie;

class PaymentController extends Controller
{
    public function __construct(protected PaymentService $paymentService, protected CO2CalculatorInterface $co2Calculator)
    {
    }

    public function start(Tenant $tenant, string $email, StartPaymentRequest $request): RedirectResponse
    {
        $footprint = $this->co2Calculator->getCO2Footprint($request->get('distance'), $request->get('mass'));

        /** @var Transaction $transaction */
        $transaction = Transaction::query()->make([
            'grams_of_co2' => $footprint->getCO2InGrams(),
            'cents_charged' => $footprint->compensationCost(),
            'order_id' => $request->get('orderId'),
            'mollie_status' => PaymentStatus::STATUS_OPEN,
        ]);
        $transaction->tenant()->associate($tenant);
        $transaction->account()->associate(Account::query()->createOrFirst(['email' => $email]));
        $transaction->save();

        $payment = $this->paymentService->createPayment($transaction);

        return redirect()->to($payment->getCheckoutUrl());
    }

    public function success(Tenant $tenant, Transaction $transaction): View
    {
        $status = Mollie::api()->payments()->get($transaction->mollie_id)->status;
        switch ($status) {
            case PaymentStatus::STATUS_PAID:
                return view('transactions.success');
            default:
                return view('transactions.failed');

        }
    }

    public function webhook(Request $request, PaymentService $paymentService): void
    {
        $paymentService->updatePayment($request->get('id'));
    }
}
