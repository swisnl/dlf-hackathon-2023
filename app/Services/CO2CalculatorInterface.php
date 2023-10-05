<?php

namespace App\Services;

use App\Domain\CO2Footprint;

interface CO2CalculatorInterface
{
    public function getCO2Footprint(float $distanceInKm, float $massKg): CO2Footprint;
}
