<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // database/seeders/UserTableSeeder.php
    public function run()
    {
        User::create([
            'name' =>'admin',
            'username' => 'admin',
            'email' => 'admin@raovat.com',
            'role_id'=> 1,
            'password' => Hash::make('123123123'),
        ]);
        User::create([
            'name' =>'user',
            'username' => 'user',
            'email' => 'user@raovat.com',
            'role_id'=> 2,
            'password' => Hash::make('123123123'),
        ]);
    }
}
