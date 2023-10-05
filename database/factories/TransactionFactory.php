<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Mollie\Api\Types\PaymentStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::factory(),
            'account_id' => Account::factory(),
            'grams_of_co2' => $gramsOfCo2 = $this->faker->numberBetween(0, 15000),
            'cents_charged' => $gramsOfCo2 / 1000,
            'mollie_status' => PaymentStatus::STATUS_OPEN,
        ];
    }
}
