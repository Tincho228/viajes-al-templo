<?php

namespace Database\Factories;

use App\Models\Seat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount'     => $this->faker->randomFloat(2, 0, 500), // Decimal between 10 and 500
            'type'     => 'transferencia',
            'seat_id'    => null,
            'trip_id'    => null,
            'user_id'    => null,
            'passenger_id'    => null,

        ];
    }
}
