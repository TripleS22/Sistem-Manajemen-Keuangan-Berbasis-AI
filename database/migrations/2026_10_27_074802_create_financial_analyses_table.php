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
        Schema::create('financial_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('period_start');
            $table->date('period_end');
            $table->decimal('total_income', 15, 2);
            $table->decimal('total_expense', 15, 2);
            $table->decimal('net_cash_flow', 15, 2);
            $table->decimal('expense_ratio', 8, 4);
            $table->decimal('income_trend', 8, 4)->default(0);
            $table->decimal('cash_flow_trend', 8, 4)->default(0);
            $table->string('prediction_label');
            $table->decimal('confidence_score', 5, 4)->nullable();
            $table->json('key_factors')->nullable();
            $table->string('model_version')->default('1.0.0');
            $table->timestamps();

            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_analyses');
    }
};
