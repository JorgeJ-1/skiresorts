<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alojamiento;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Alojamiento::factory(30)->create();
    }
}
