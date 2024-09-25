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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Project name
            $table->date('startdate');  // Project start date
            $table->date('enddate')->nullable();  // Project end date (nullable)
            $table->decimal('fundallocation', 15, 2);  // Fund allocation for the project
            $table->string('projectpicture')->nullable();  // Path to the project picture (nullable)
            $table->string('projectreport')->nullable();  // Path to the project picture (nullable)
            $table->text('progressreport')->nullable();  // Progress report for the project (nullable)
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');  // Associate with Department
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Associate with User
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
