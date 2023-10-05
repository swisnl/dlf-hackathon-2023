<?php

namespace App\Services;

use App\Models\Transaction;
use Mollie\Api\Resources\Payment;
use Mollie\Laravel\Facades\Mollie;

class PaymentService
{
    public function createPayment(Transaction $transaction): Payment
    {
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => number_format($transaction->cents_charged / 100, 2, '.', ''),
            ],
            'description' => sprintf('Compensatie voor %s', $transaction->order_id),
            'redirectUrl' => route('transactions.redirect', ['tenant' => $transaction->tenant, 'transaction' => $transaction->getKey()]),
            'webhookUrl' => route('transactions.webhook'),
            'metadata' => [
                'transaction_id' => $transaction->getKey(),
            ],
        ]);
        $transaction->update(['mollie_id' => $payment->id]);

        return $payment;
    }

    public function updatePayment(string $paymentId): Payment
    {
        $payment = Mollie::api()->payments()->get($paymentId);
        $transaction = Transaction::findOrFail($payment->metadata->transaction_id);

        if ($payment->isPaid() && $transaction->paid_at === null) {
            $transaction->paid_at = now();
        }

        $transaction->mollie_status = $payment->status;
        $transaction->save();

        return $payment;
    }
}
