<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User; // Make sure to import your User model

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'User',
            'email' => 'user@localhost',
            'password' => Hash::make('password'),
        ]);
    }
}
