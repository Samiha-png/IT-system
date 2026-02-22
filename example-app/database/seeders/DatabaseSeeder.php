<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Student User
        User::create([
            'name' => 'Ali Student',
            'email' => 'student@lab.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        // 2. Network Team (Staff)
        User::create([
            'name' => 'Waqas Network',
            'email' => 'staff@lab.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        // 3. Faculty User
        User::create([
            'name' => 'Dr. Kamran',
            'email' => 'faculty@lab.com',
            'password' => Hash::make('password'),
            'role' => 'faculty',
        ]);
    }
}