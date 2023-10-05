<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentRequest;
use App\Models\Transaction;
use App\Services\PaymentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function store(CreatePaymentRequest $request, PaymentService $paymentService): RedirectResponse
    {
        $transaction = Transaction::factory()->create(['cents_charged' => $request->amount, 'order_id' => $request->orderId]);

        return $paymentService->createPayment($request->amount, $transaction->getKey());
    }

    public function create(): View
    {
        return view('transactions.create');
    }

    public function success(): View
    {
        return view('transactions.success');
    }

    public function webhook(Request $request, PaymentService $paymentService): void
    {
        $paymentService->updatePayment($request->get('id'));
    }
}
