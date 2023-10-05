<?php

namespace App\Services;

use App\Domain\CO2Footprint;

class CO2Calculator implements CO2CalculatorInterface
{
    public function getCO2Footprint(float $distanceInKm, float $massKg = 0): CO2Footprint
    {
        // Default values if inputs are missing or invalid
        $massInMetricTons = $this->kilogramsToMetricTons($massKg);

        // Calculate additional energy
        $additionalEnergy = 20 / 0.6214;

        // Calculate and return the total energy
        return new CO2Footprint(97 * $massInMetricTons * $distanceInKm + 1135 * $massInMetricTons * $additionalEnergy);
    }

    protected function kilogramsToMetricTons(float $kg): float
    {
        return $kg / 1000;
    }
}
