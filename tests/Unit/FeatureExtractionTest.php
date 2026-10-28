<?php

namespace Tests\Unit;

use App\Models\Transaction;
use App\Models\User;
use App\Services\ML\DatasetGenerator;
use App\Services\ML\FinancialDecisionTreeService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Unit tests for ML feature extraction and dataset generation.
 * FR-05: Decision Tree must produce valid classifications from financial features.
 */
class FeatureExtractionTest extends TestCase
{
    use RefreshDatabase;

    private FinancialDecisionTreeService $mlService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mlService = app(FinancialDecisionTreeService::class);
    }

    /** @test */
    public function test_feature_extraction_returns_all_required_keys(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        $this->assertArrayHasKey('total_income', $features);
        $this->assertArrayHasKey('total_expense', $features);
        $this->assertArrayHasKey('net_cash_flow', $features);
        $this->assertArrayHasKey('expense_ratio', $features);
        $this->assertArrayHasKey('income_trend', $features);
        $this->assertArrayHasKey('cash_flow_trend', $features);
    }

    /** @test */
    public function test_feature_extraction_returns_zero_income_when_no_transactions(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        $this->assertEquals(0.0, $features['total_income']);
        $this->assertEquals(0.0, $features['total_expense']);
        $this->assertEquals(0.0, $features['net_cash_flow']);
    }

    /** @test */
    public function test_feature_extraction_calculates_correct_income_total(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $user->id, 'amount' => 3_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->income()->create(['user_id' => $user->id, 'amount' => 2_000_000, 'transaction_date' => '2026-10-20']);

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        $this->assertEqualsWithDelta(5_000_000.0, $features['total_income'], 0.01);
    }

    /** @test */
    public function test_feature_extraction_calculates_correct_net_cash_flow(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $user->id, 'amount' => 8_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->expense()->create(['user_id' => $user->id, 'amount' => 5_500_000, 'transaction_date' => '2026-10-15']);

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        $this->assertEqualsWithDelta(2_500_000.0, $features['net_cash_flow'], 0.01);
    }

    /** @test */
    public function test_expense_ratio_is_correctly_computed(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $user->id, 'amount' => 10_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->expense()->create(['user_id' => $user->id, 'amount' => 7_000_000, 'transaction_date' => '2026-10-15']);

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        // expense_ratio = 7_000_000 / 10_000_000 = 0.7
        $this->assertEqualsWithDelta(0.70, (float) $features['expense_ratio'], 0.001);
    }

    /** @test */
    public function test_expense_ratio_is_clamped_when_income_is_zero(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->expense()->create(['user_id' => $user->id, 'amount' => 1_000_000, 'transaction_date' => '2026-10-10']);

        $features = $this->mlService->extractFeatures($user->id, $start, $end);

        // No income → expense_ratio should be 1.5 (penalty for zero income with expenses)
        $this->assertEquals(1.5, $features['expense_ratio']);
    }

    /** @test */
    public function test_dataset_generator_produces_correct_sample_count(): void
    {
        $generator = app(DatasetGenerator::class);
        $generated = $generator->generate(300);

        $this->assertArrayHasKey('samples', $generated);
        $this->assertArrayHasKey('labels', $generated);
        $this->assertCount(300, $generated['samples']);
        $this->assertCount(300, $generated['labels']);
    }

    /** @test */
    public function test_dataset_generator_produces_valid_labels(): void
    {
        $generator = app(DatasetGenerator::class);
        $generated = $generator->generate(100);

        $validLabels = ['Sehat', 'Perlu perhatian', 'Berisiko'];

        foreach ($generated['labels'] as $label) {
            $this->assertContains($label, $validLabels, "Label '{$label}' is not a valid classification label");
        }
    }

    /** @test */
    public function test_dataset_generator_produces_samples_with_six_features(): void
    {
        $generator = app(DatasetGenerator::class);
        $generated = $generator->generate(50);

        foreach ($generated['samples'] as $sample) {
            $this->assertCount(6, $sample, 'Each sample must have exactly 6 features');
            foreach ($sample as $feature) {
                $this->assertIsFloat($feature, 'Each feature must be a float');
            }
        }
    }

    /** @test */
    public function test_dataset_has_all_three_label_classes_represented(): void
    {
        $generator = app(DatasetGenerator::class);
        $generated = $generator->generate(300);

        $uniqueLabels = array_unique($generated['labels']);
        sort($uniqueLabels);

        $this->assertContains('Sehat', $uniqueLabels);
        $this->assertContains('Perlu perhatian', $uniqueLabels);
        $this->assertContains('Berisiko', $uniqueLabels);
    }
}
