<?php

namespace Database\Factories;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hospital::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->city,
            'contactnumber' => $this->faker->numberBetween($min = 1000000, $max = 9999999),
            'beds' => $this->faker->numberBetween($min = 0, $max = 50),

            'created_at' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'updated_at' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
        ];
    }
}
