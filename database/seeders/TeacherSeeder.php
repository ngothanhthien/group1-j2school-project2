<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];

        $faker = \Faker\Factory::create();

        $majors = Major::query()->pluck('id')->toArray();

        for ($i = 1; $i <= 100; $i++) {
            $arr = [
                'name' => $faker->name,
                'email' => $faker->unique()->companyEmail,
                'password' => $faker->password,
                'phone' => $faker->boolean ? $faker->phoneNumber : null,
                'gender' => $faker->boolean,
                'major_id' => $majors[array_rand($majors)],
            ];

            if ($i % 10 === 0) {
                Teacher::insert($arr);
                $arr = [];
            }
        }
    }
}
