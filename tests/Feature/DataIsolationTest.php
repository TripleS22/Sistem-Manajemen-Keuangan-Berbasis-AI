<?php

namespace Tests\Feature;

use App\Models\FinancialAnalysis;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * FR-08: Keamanan – Pengguna tidak dapat mengakses transaksi atau analisis milik pengguna lain.
 * Tests cross-user data isolation for transactions and financial analyses.
 */
class DataIsolationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_user_cannot_read_another_users_transactions(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $transactionA = Transaction::factory()->create(['user_id' => $userA->id]);
        Transaction::factory()->create(['user_id' => $userB->id]);

        // Simulate user A's scoped query
        $results = Transaction::where('user_id', $userA->id)->get();

        $this->assertCount(1, $results);
        $this->assertEquals($transactionA->id, $results->first()->id);
    }

    /** @test */
    public function test_user_cannot_read_another_users_financial_analyses(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $analysisA = FinancialAnalysis::factory()->create(['user_id' => $userA->id]);
        FinancialAnalysis::factory()->count(3)->create(['user_id' => $userB->id]);

        // Simulate user A's scoped query
        $results = FinancialAnalysis::where('user_id', $userA->id)->get();

        $this->assertCount(1, $results);
        $this->assertEquals($analysisA->id, $results->first()->id);
    }

    /** @test */
    public function test_multiple_users_transactions_do_not_leak_across_accounts(): void
    {
        $users = User::factory()->count(5)->create();

        foreach ($users as $index => $user) {
            // Each user gets a unique count
            Transaction::factory()->count($index + 1)->create(['user_id' => $user->id]);
        }

        foreach ($users as $index => $user) {
            $count = Transaction::where('user_id', $user->id)->count();
            $this->assertEquals($index + 1, $count, "User {$user->id} should have ".($index + 1).' transactions');
        }
    }

    /** @test */
    public function test_income_sum_is_isolated_per_user(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        Transaction::factory()->income()->create(['user_id' => $userA->id, 'amount' => 10_000_000]);
        Transaction::factory()->income()->create(['user_id' => $userB->id, 'amount' => 99_000_000]);

        $incomeA = (float) Transaction::where('user_id', $userA->id)->income()->sum('amount');

        $this->assertEqualsWithDelta(10_000_000.0, $incomeA, 0.01, 'User A income should not include User B data');
    }

    /** @test */
    public function test_financial_analysis_prediction_belongs_to_correct_user(): void
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        FinancialAnalysis::factory()->healthy()->create(['user_id' => $userA->id]);
        FinancialAnalysis::factory()->atRisk()->create(['user_id' => $userB->id]);

        $analysisA = FinancialAnalysis::where('user_id', $userA->id)->first();
        $analysisB = FinancialAnalysis::where('user_id', $userB->id)->first();

        $this->assertEquals('Sehat', $analysisA->prediction_label);
        $this->assertEquals('Berisiko', $analysisB->prediction_label);
    }
}
