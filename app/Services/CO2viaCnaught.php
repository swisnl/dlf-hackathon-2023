<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CO2viaCnaught implements CO2CalculatorInterface
{
    public function __construct(
        readonly protected string $apiKey
    )
    {
    }

    public function getCO2InGrams(float $distanceInKm, float $weightInKg): float
    {
        $response = Http::withToken($this->apiKey)
            ->post('https://api.cnaught.com/v1/quotes/ride', ['distance_km' => (float) $distanceInKm])
            ->json();

        return $response['amount_kg'] * 1000;
    }
}
