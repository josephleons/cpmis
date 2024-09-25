<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'body' => 'This is the first comment on Project A.',
            'comment_date' => now(),  // Current timestamp
            'project_id' => 1,  // Assuming Project A has ID 1
            'user_id' => 1,  // Assuming User 1 is the author

        ]);
    }
}
