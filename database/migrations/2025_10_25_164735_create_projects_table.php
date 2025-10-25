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
            $table->foreignId('profile_id')->constrained()->onDelete('cascade'); // Clasifica el proyecto (área tecnológica)
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('role')->nullable(); // Participación personal en ese proyecto
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('team_size')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_favorite')->default(false);
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
