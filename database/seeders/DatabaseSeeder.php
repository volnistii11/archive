<?php

namespace Database\Seeders;

use App\Models\Format;
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
        // \App\Models\User::factory(10)->create();
        $formats = Format::factory(10)
            ->create();
    }
}
