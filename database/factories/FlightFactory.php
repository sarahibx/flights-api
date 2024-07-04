<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departure_time = $this->faker->dateTime;
        $arrival_time = $this->faker->dateTimeBetween($departure_time, $departure_time->format('Y-m-d H:i:s').' +12 hours');

        return [
            'number' => $this->faker->regexify('[A-Z]{2}[0-9]{4}'),
            'departure_city' => $this->faker->city,
            'arrival_city' => $this->faker->city,
            'departure_time' => $departure_time,
            'arrival_time' => $arrival_time,
        ];
    }
}
