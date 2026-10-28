<?php

namespace App\Models;

use Database\Factories\FinancialAnalysisFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'user_id',
    'period_start',
    'period_end',
    'total_income',
    'total_expense',
    'net_cash_flow',
    'expense_ratio',
    'income_trend',
    'cash_flow_trend',
    'prediction_label',
    'confidence_score',
    'key_factors',
    'model_version',
])]
class FinancialAnalysis extends Model
{
    /** @use HasFactory<FinancialAnalysisFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'period_start' => 'date',
            'period_end' => 'date',
            'total_income' => 'decimal:2',
            'total_expense' => 'decimal:2',
            'net_cash_flow' => 'decimal:2',
            'expense_ratio' => 'decimal:4',
            'income_trend' => 'decimal:4',
            'cash_flow_trend' => 'decimal:4',
            'confidence_score' => 'decimal:4',
            'key_factors' => 'array',
        ];
    }

    /**
     * User relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Associated LLM explanation.
     */
    public function explanation(): HasOne
    {
        return $this->hasOne(AnalysisExplanation::class);
    }
}
