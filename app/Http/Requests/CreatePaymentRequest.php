<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'amount' => [
                'required',
                'numeric',
            ],
            'orderId' => [
                'required',
                'string',
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
