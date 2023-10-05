<?php

namespace App\Services;

interface CO2CalculatorInterface
{
    public function getCO2InGrams(float $distanceInKm, float $massKg): float;
}
