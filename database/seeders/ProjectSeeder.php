<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'Project A',
            'startdate' => '2024-01-01',
            'enddate' => '2024-12-31',
            'fundallocation' => 1000000.00,
            'projectpicture' => 'project_a.jpg',
            'projectreport' => 'project_b.pdf',
            'progressreport' => 'Initial report on Project A',
            'department_id' => 1,  // Assuming department ID 1
            'user_id' => 1,  // Assuming user ID 1
        ]);
    }
}
