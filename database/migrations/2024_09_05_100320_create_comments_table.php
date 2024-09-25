<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');  // The content of the comment
            $table->timestamp('comment_date')->nullable();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');  // Associate with the Project model
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Associate with the User model
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
