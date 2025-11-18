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
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('form_type')->default('adult'); // 'adult' / 'child'
            $table->string('form_name')->nullable();
            $table->json('form_data')->nullable();
            $table->json('section_scores')->nullable();
            $table->integer('total_score')->nullable();
            $table->integer('current_step')->default(1);
            $table->enum('status', ['draft', 'completed'])->default('draft');
            $table->string('pdf_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};
