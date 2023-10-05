<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Mollie\Laravel\Facades\Mollie;

class PaymentService
{
    public function createPayment(float $amount, string $transactionId): RedirectResponse
    {
        $amount = number_format($amount / 100, 2, '.', '');
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => $amount,
            ],
            'description' => 'Order #12345',
            'redirectUrl' => route('transactions.redirect'),
            'webhookUrl' => route('transactions.webhook'),
            'metadata' => [
                'transaction_id' => $transactionId,
            ],
        ]);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function updatePayment(string $paymentId): void
    {
        $payment = Mollie::api()->payments()->get($paymentId);
        $transaction = Transaction::findOrFail($payment->metadata->transaction_id);

        if (! $transaction->mollie_id) {
            $transaction->mollie_id = $paymentId;
        }

        $transaction->mollie_status = $payment->status;
        $transaction->save();
    }
}
