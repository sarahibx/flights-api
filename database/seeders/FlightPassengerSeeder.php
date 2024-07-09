<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flight;
use App\Models\Passenger;
class FlightPassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flights = Flight::all();
        $passengers = Passenger::all();

        foreach ($flights as $flight) {
            $flight->passengers()->attach(
                $passengers->random(rand(1, 10))->pluck('id')->toArray()
            );
        }
    }
}
