<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Major;
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
        Admin::factory(1)->create();
    }
}
