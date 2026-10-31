<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FinancialReportPrintTest extends TestCase
{
    use RefreshDatabase;

    public function test_print_report_renders_consistent_totals_for_the_period(): void
    {
        $user = User::factory()->create();
        $incomeCategory = TransactionCategory::factory()->income()->create(['user_id' => $user->id]);
        $expenseCategory = TransactionCategory::factory()->expense()->create(['user_id' => $user->id]);

        Transaction::create([
            'user_id' => $user->id,
            'transaction_category_id' => $incomeCategory->id,
            'type' => 'income',
            'amount' => 500000,
            'transaction_date' => now()->startOfMonth()->toDateString(),
            'description' => 'Penjualan tunai',
        ]);

        Transaction::create([
            'user_id' => $user->id,
            'transaction_category_id' => $expenseCategory->id,
            'type' => 'expense',
            'amount' => 200000,
            'transaction_date' => now()->startOfMonth()->toDateString(),
            'description' => 'Bahan baku',
        ]);

        $response = $this->actingAs($user)->get(route('reports.print', [
            'start' => now()->startOfMonth()->toDateString(),
            'end' => now()->endOfMonth()->toDateString(),
        ]));

        $response->assertOk();
        $response->assertSee('Rp 500.000');
        $response->assertSee('Rp 200.000');
        $response->assertSee('Rp 300.000');
    }

    public function test_print_report_does_not_include_other_users_transactions(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        Transaction::create([
            'user_id' => $otherUser->id,
            'transaction_category_id' => TransactionCategory::factory()->create(['user_id' => $otherUser->id])->id,
            'type' => 'income',
            'amount' => 777000,
            'transaction_date' => now()->startOfMonth()->toDateString(),
            'description' => 'Transaksi milik pengguna lain',
        ]);

        $response = $this->actingAs($user)->get(route('reports.print', [
            'start' => now()->startOfMonth()->toDateString(),
            'end' => now()->endOfMonth()->toDateString(),
        ]));

        $response->assertOk();
        $response->assertDontSee('Transaksi milik pengguna lain');
    }

    public function test_print_report_requires_authentication(): void
    {
        $this->get(route('reports.print'))->assertRedirect();
    }
}
