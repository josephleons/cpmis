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
            'fullname' => 'Emmanuel E.Mtumishi',
            'gender'=>'Male',
            'phone' => '+255766571522',
            'username' => 'admin@gmail.com',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Always hash passwords
            'role_id' => 1, // Assuming 1 is the role ID for 'admin'
            'department_id' => 1,
        ]);
        User::create([
            'fullname' => 'Jamse P.Kimario',
            'gender'=>'Male',
            'phone' => '+255766571522',
            'username' => 'facility@gmail.com',
            'email' => 'facility@example.com',
            'password' => Hash::make('password'), // Always hash passwords
            'role_id' => 2, // Assuming 1 is the role ID for 'admin'
            'department_id' => 3,
        ]);
        User::create([
            'fullname' => 'Mtiko M.Kuriho',
            'gender'=>'Male',
            'phone' => '+255766571522',
            'username' => 'hod@gmail.com',
            'email' => 'hod@example.com',
            'password' => Hash::make('password'), // Always hash passwords
            'role_id' => 3, // Assuming 1 is the role ID for 'admin'
            'department_id' => 1,
        ]);
        User::create([
            'fullname' => 'Severine Lekovid Mrasa',
            'gender'=>'Male',
            'phone' => '+255766571522',
            'username' => 'coordinator@gmail.com',
            'email' => 'coordinator@example.com',
            'password' => Hash::make('password'), // Always hash passwords
            'role_id' => 4, // Assuming 1 is the role ID for 'admin'
            'department_id' => 1,
        ]);
    }
}
