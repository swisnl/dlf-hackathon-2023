<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

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
    public function handle()
    {
        $response = Http::withToken(config('services.cnaught.api_key'))
            ->post('https://api.cnaught.com/v1/quotes/ride', ['distance_km' => (float) $this->argument('distance')])
            ->json();

        $this->info(sprintf('The quote for your ride is %s kg of CO2', $response['amount_kg']));
    }
}
