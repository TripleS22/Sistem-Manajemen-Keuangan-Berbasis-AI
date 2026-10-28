<?php

namespace App\Models;

use Database\Factories\AnalysisExplanationFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'financial_analysis_id',
    'explanation',
    'recommendations',
    'provider',
    'status',
    'error_message',
])]
class AnalysisExplanation extends Model
{
    /** @use HasFactory<AnalysisExplanationFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'recommendations' => 'array',
        ];
    }

    /**
     * Associated financial analysis.
     */
    public function financialAnalysis(): BelongsTo
    {
        return $this->belongsTo(FinancialAnalysis::class);
    }
}
