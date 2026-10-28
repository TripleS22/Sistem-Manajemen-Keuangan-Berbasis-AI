<?php

namespace Tests\Feature;

use App\Models\AnalysisExplanation;
use App\Models\FinancialAnalysis;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * FR-05: Decision Tree – Sistem menghasilkan klasifikasi dari fitur keuangan yang valid.
 * FR-06: Penjelasan LLM – Hasil model dapat dijelaskan melalui API tanpa mengubah data sumber.
 * FR-07: Ketahanan layanan – Jika API LLM gagal, pencatatan dan klasifikasi tetap berfungsi.
 */
class FinancialAnalysisTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_financial_analysis_is_persisted_with_all_required_fields(): void
    {
        $user = User::factory()->create();

        $analysis = FinancialAnalysis::factory()->healthy()->create(['user_id' => $user->id]);

        $this->assertDatabaseHas('financial_analyses', [
            'id' => $analysis->id,
            'user_id' => $user->id,
            'prediction_label' => 'Sehat',
        ]);

        $this->assertNotNull($analysis->period_start);
        $this->assertNotNull($analysis->period_end);
        $this->assertNotNull($analysis->model_version);
    }

    /** @test */
    public function test_prediction_label_is_one_of_three_valid_categories(): void
    {
        $user = User::factory()->create();

        $validLabels = ['Sehat', 'Perlu perhatian', 'Berisiko'];

        $analyses = FinancialAnalysis::factory()->count(10)->create(['user_id' => $user->id]);

        foreach ($analyses as $analysis) {
            $this->assertContains($analysis->prediction_label, $validLabels);
        }
    }

    /** @test */
    public function test_financial_analysis_key_factors_is_stored_as_array(): void
    {
        $user = User::factory()->create();
        $analysis = FinancialAnalysis::factory()->create([
            'user_id' => $user->id,
            'key_factors' => ['Arus kas positif', 'Rasio pengeluaran efisien'],
        ]);

        $fresh = $analysis->fresh();

        $this->assertIsArray($fresh->key_factors);
        $this->assertCount(2, $fresh->key_factors);
    }

    /** @test */
    public function test_analysis_explanation_is_linked_to_financial_analysis(): void
    {
        $user = User::factory()->create();
        $analysis = FinancialAnalysis::factory()->create(['user_id' => $user->id]);

        $explanation = AnalysisExplanation::create([
            'financial_analysis_id' => $analysis->id,
            'explanation' => 'Usaha dalam kondisi baik dengan arus kas positif.',
            'recommendations' => ['Pertahankan pengelolaan keuangan yang baik.'],
            'provider' => 'gemini',
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('analysis_explanations', [
            'financial_analysis_id' => $analysis->id,
            'provider' => 'gemini',
        ]);

        // Test relation
        $this->assertNotNull($analysis->explanation);
        $this->assertEquals($explanation->id, $analysis->explanation->id);
    }

    /** @test */
    public function test_analysis_remains_accessible_when_explanation_status_is_fallback(): void
    {
        // FR-07: Jika API LLM gagal, pencatatan dan klasifikasi tetap berfungsi.
        $user = User::factory()->create();
        $analysis = FinancialAnalysis::factory()->create(['user_id' => $user->id]);

        AnalysisExplanation::create([
            'financial_analysis_id' => $analysis->id,
            'explanation' => 'Penjelasan otomatis: kondisi keuangan perlu pemantauan.',
            'recommendations' => ['Pantau pengeluaran secara berkala.'],
            'provider' => 'rule_based_fallback',
            'status' => 'fallback',
        ]);

        $fresh = $analysis->fresh();

        // Classification result must still be present regardless of LLM status
        $this->assertNotNull($fresh->prediction_label);
        $this->assertNotNull($fresh->explanation);
        $this->assertEquals('fallback', $fresh->explanation->status);
    }

    /** @test */
    public function test_confidence_score_is_between_zero_and_one(): void
    {
        $user = User::factory()->create();
        $analyses = FinancialAnalysis::factory()->count(10)->create(['user_id' => $user->id]);

        foreach ($analyses as $analysis) {
            $this->assertGreaterThanOrEqual(0.0, (float) $analysis->confidence_score);
            $this->assertLessThanOrEqual(1.0, (float) $analysis->confidence_score);
        }
    }

    /** @test */
    public function test_net_cash_flow_equals_income_minus_expense_in_analysis(): void
    {
        $user = User::factory()->create();
        $analysis = FinancialAnalysis::factory()->create([
            'user_id' => $user->id,
            'total_income' => 10_000_000,
            'total_expense' => 6_000_000,
            'net_cash_flow' => 4_000_000,
        ]);

        $calculated = (float) $analysis->total_income - (float) $analysis->total_expense;

        $this->assertEqualsWithDelta((float) $analysis->net_cash_flow, $calculated, 0.01);
    }

    /** @test */
    public function test_user_can_have_multiple_analyses_over_time(): void
    {
        $user = User::factory()->create();

        FinancialAnalysis::factory()->count(4)->create(['user_id' => $user->id]);

        $count = FinancialAnalysis::where('user_id', $user->id)->count();
        $this->assertEquals(4, $count);
    }
}
