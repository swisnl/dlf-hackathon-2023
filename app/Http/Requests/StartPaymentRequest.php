<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartPaymentRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'mass' => [
                'required',
                'numeric',
            ],
            'distance' => [
                'required',
                'numeric',
            ],
            'orderId' => [
                'string',
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
