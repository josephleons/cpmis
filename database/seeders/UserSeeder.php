<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'username' => 'admin@gmail.com',
            'email' => 'admin@example.com',
            'phone' => '123456789',
            'password' => Hash::make('password'), // Always hash passwords
            'role_id' => 1, // Assuming 1 is the role ID for 'admin'
            'department_id' => 1,
        ]);
        User::create([
            'username' => 'facility@gmail.com',
            'email' => 'facility@example.com',
            'phone' => '123456789',
            'password' => Hash::make('password'), // Always hash passwords
            'role_id' => 2, // Assuming 1 is the role ID for 'admin'
            'department_id' => 3,
        ]);
        User::create([
            'username' => 'hod@gmail.com',
            'email' => 'hod@example.com',
            'phone' => '123456789',
            'password' => Hash::make('password'), // Always hash passwords
            'role_id' => 2, // Assuming 1 is the role ID for 'admin'
            'department_id' => 1,
        ]);
        User::create([
            'username' => 'coordinator@gmail.com',
            'email' => 'coordinator@example.com',
            'phone' => '123456789',
            'password' => Hash::make('password'), // Always hash passwords
            'role_id' => 4, // Assuming 1 is the role ID for 'admin'
            'department_id' => 1,
        ]);
    }
}
