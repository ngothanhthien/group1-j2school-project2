<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Major;
use App\Models\Ministry;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Major::factory(10)->create();
        Course::factory(10)->create();
        Ministry::factory(10)->create();

        $this->call(TeacherSeeder::class);
    }
}
