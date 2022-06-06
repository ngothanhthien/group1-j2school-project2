<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
