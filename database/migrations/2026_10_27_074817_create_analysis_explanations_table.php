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
        Schema::create('analysis_explanations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financial_analysis_id')->constrained('financial_analyses')->cascadeOnDelete();
            $table->longText('explanation')->nullable();
            $table->json('recommendations')->nullable();
            $table->string('provider')->default('gemini');
            $table->string('status')->default('pending');
            $table->text('error_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_explanations');
    }
};
