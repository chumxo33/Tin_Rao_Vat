<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\CategoriesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // Database/seeders/DatabaseSeeder.php
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UserTableSeeder::class,
            CategoriesTableSeeder::class,
     ]);
    }
}
