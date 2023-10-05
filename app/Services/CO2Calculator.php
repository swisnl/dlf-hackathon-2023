<?php

namespace App\Services;

class CO2Calculator implements CO2CalculatorInterface
{
    public function __construct(
        readonly protected int $co2GramsPerKgKm
    )
    {
    }

    public function getCO2InGrams(float $distanceInKm, float $weightInKg): float
    {
        return $this->co2GramsPerKgKm * $distanceInKm * $weightInKg;
    }
}
