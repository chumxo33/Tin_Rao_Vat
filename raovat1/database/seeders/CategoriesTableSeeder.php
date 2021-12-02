<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Database/seeders/CategoriesTableSeeder.php
    public function run()
    {
        Category::create(['name' => 'Do Dien Tu']);
        Category::create(['name' => 'Dien Thoai', 'parent_id'=> 1]);
        Category::create(['name' => 'May Tinh Bang','parent_id'=> 1]);
        Category::create(['name' => 'Lap Top','parent_id'=> 3]);
        Category::create(['name' => 'Noi Ngoai That']);
    }
}
