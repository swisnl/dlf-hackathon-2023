<?php

namespace App\Services;

class CO2Calculator implements CO2CalculatorInterface
{
    public function getCO2InGrams(float $distanceInKm, float $massKg = 0): float
    {
        // Default values if inputs are missing or invalid
        $massInMetricTons = $this->kilogramsToMetricTons($massKg);

        // Calculate additional energy
        $additionalEnergy = 20 / 0.6214;

        // Calculate and return the total energy
        return 97 * $massInMetricTons * $distanceInKm + 1135 * $massInMetricTons * $additionalEnergy;
    }

    protected function kilogramsToMetricTons(float $kg): float
    {
        return $kg / 1000;
    }
}
