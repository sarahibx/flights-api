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
        $passengers = Passenger::all();
        $flights = Flight::all();

        $passengers->each(function ($passenger) use ($flights) {
            $assigned_Flights = $flights->random(rand(1, 3))->pluck('id');
            $passenger->flights()->attach($assigned_Flights);
        });
    }
}
