<?php

namespace App\Filament\Resources\FinancialAnalyses\Pages;

use App\Filament\Resources\FinancialAnalyses\FinancialAnalysisResource;
use App\Models\AnalysisExplanation;
use App\Models\BusinessProfile;
use App\Models\FinancialAnalysis;
use App\Services\AI\GeminiExplanationService;
use App\Services\ML\FinancialDecisionTreeService;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateFinancialAnalysis extends CreateRecord
{
    protected static string $resource = FinancialAnalysisResource::class;

    protected static ?string $title = 'Jalankan Analisis Keuangan AI';

    protected function handleRecordCreation(array $data): Model
    {
        $userId = auth()->id();
        $start = Carbon::parse($data['period_start'])->startOfDay();
        $end = Carbon::parse($data['period_end'])->endOfDay();

        $profile = BusinessProfile::firstOrCreate(
            ['user_id' => $userId],
            [
                'business_name' => auth()->user()->name.' Business',
                'business_type' => 'UMKM',
                'initial_capital' => 0,
            ]
        );

        $mlService = app(FinancialDecisionTreeService::class);
        $features = $mlService->extractFeatures($userId, $start, $end);

        // Klasifikasi kondisi keuangan dengan model Decision Tree
        $mlResult = $mlService->predict($features);

        // Ekstraksi penjelasan dan rekomendasi dari LLM (Gemini API)
        $aiService = app(GeminiExplanationService::class);
        $llmResult = $aiService->explain($profile, $features, $mlResult);

        // Simpan hasil analisis finansial
        $analysis = FinancialAnalysis::create([
            'user_id' => $userId,
            'period_start' => $data['period_start'],
            'period_end' => $data['period_end'],
            'total_income' => $features['total_income'],
            'total_expense' => $features['total_expense'],
            'net_cash_flow' => $features['net_cash_flow'],
            'expense_ratio' => $features['expense_ratio'],
            'income_trend' => $features['income_trend'],
            'cash_flow_trend' => $features['cash_flow_trend'],
            'prediction_label' => $mlResult['prediction'],
            'confidence_score' => $mlResult['confidence'],
            'key_factors' => $mlResult['key_factors'],
            'model_version' => '1.0.0 (Decision Tree)',
        ]);

        // Simpan narasi penjelasan dan rekomendasi
        AnalysisExplanation::create([
            'financial_analysis_id' => $analysis->id,
            'explanation' => $llmResult['explanation'],
            'recommendations' => $llmResult['recommendations'],
            'provider' => $llmResult['provider'],
            'status' => $llmResult['status'],
        ]);

        Notification::make()
            ->title('Analisis Keuangan Berhasil!')
            ->body("Kondisi keuangan diklasifikasikan sebagai {$mlResult['prediction']}.")
            ->success()
            ->send();

        return $analysis;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->record]);
    }
}
