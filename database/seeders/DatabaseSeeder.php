<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      // Seeders will run in this order
      $this->call([
        RoleSeeder::class,
        DepartmentSeeder::class,
        UserSeeder::class,
        ProjectSeeder::class,
        CommentSeeder::class,
    ]);
    }
}
