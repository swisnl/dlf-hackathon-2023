<?php

namespace App\Console\Commands;

use App\Services\CO2CalculatorInterface;
use Illuminate\Console\Command;

class QuoteCarbonFootprint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:quote-carbon-footprint {distance}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a CO2 quote for a ride';

    /**
     * Execute the console command.
     */
    public function handle(CO2CalculatorInterface $calculator): int
    {
        $co2 = $calculator->getCO2Footprint((float) $this->argument('distance'), 10);

        $this->info(sprintf('The quote for your ride is %s grams of CO2', $co2->getCO2InGrams()));
        $this->info(sprintf('Become CO2 Positive by donating €%.2f', $co2->compensationCost() / 100));

        return 0;
    }
}
