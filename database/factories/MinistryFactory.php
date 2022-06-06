<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MinistryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->companyEmail,
            'password' => $this->faker->password,
            'phone' => $this->faker->boolean ? $this->faker->phoneNumber : null,
            'gender' => $this->faker->boolean,
        ];
    }
}
