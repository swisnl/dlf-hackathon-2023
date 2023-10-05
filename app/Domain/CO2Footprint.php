<?php

namespace App\Domain;

class CO2Footprint
{
    protected float $costPerGram = 0.01;

    protected float $baseCost = 50;

    public function __construct(
        readonly protected float $co2InGrams
    ) {
    }

    public function getCO2InGrams(): float
    {
        return $this->co2InGrams;
    }

    public function compensationCost(): float
    {
        return $this->co2InGrams * $this->costPerGram + $this->baseCost;
    }
}
