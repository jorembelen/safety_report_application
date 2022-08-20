<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


class IncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = DB::table('users')->whererole('user')->get()->random()->id;
        $locationId = DB::table('locations')->get()->random()->id;
        $employee = DB::table('employees')->get()->random()->id;

        return [
            'user_id' => $user,
            'location' => $locationId,
            'employee_id' => $employee,
            'sel_involved' => $this->faker->randomElement(['Employee', 'Non Employee']),
            'involved' => $this->faker->text(20),
            'type' => $this->faker->randomElement(['Lost Time Injury', 'First Aid', 'Property Damage', 'Fatality', 'MTC', 'RWC', 'MVI', 'Near Miss']),
            'inc_category' => $this->faker->text(10),
            'insurance' => $this->faker->randomElement(['Gosi', 'Non Gosi']),
            'wps' => $this->faker->numberBetween(1, 5),
            'severity' => $this->faker->numberBetween(1, 5),
            'injury_location' => $this->faker->randomElement(['Face', 'Leg', 'Hands', 'Body', 'None']),
            'cause' => $this->faker->text(10),
            'equipment' => $this->faker->randomElement(['Plant Equipment', 'Building', 'Scaffold', 'Light Vehicle', 'None']),
            'description' => $this->faker->text(100),
            'action' => $this->faker->text(30),
            'date' => $this->faker->dateTimeBetween('-540 days'),
        ];
    }
}
