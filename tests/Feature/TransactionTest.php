<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * FR-02: Transaksi
 * Pengguna dapat menambah, mengubah, menghapus, dan memfilter transaksi.
 * FR-08: Pengguna tidak dapat mengakses transaksi milik pengguna lain.
 */
class TransactionTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private TransactionCategory $incomeCategory;

    private TransactionCategory $expenseCategory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->incomeCategory = TransactionCategory::factory()->income()->create(['user_id' => $this->user->id]);
        $this->expenseCategory = TransactionCategory::factory()->expense()->create(['user_id' => $this->user->id]);
    }

    /** @test */
    public function test_income_transaction_is_persisted_correctly(): void
    {
        $transaction = Transaction::factory()->income()->create([
            'user_id' => $this->user->id,
            'transaction_category_id' => $this->incomeCategory->id,
            'amount' => 5_000_000,
            'transaction_date' => '2026-10-01',
            'description' => 'Penjualan produk Oktober',
        ]);

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'user_id' => $this->user->id,
            'type' => 'income',
            'amount' => '5000000.00',
        ]);
    }

    /** @test */
    public function test_expense_transaction_is_persisted_correctly(): void
    {
        $transaction = Transaction::factory()->expense()->create([
            'user_id' => $this->user->id,
            'transaction_category_id' => $this->expenseCategory->id,
            'amount' => 2_500_000,
            'transaction_date' => '2026-10-05',
        ]);

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'user_id' => $this->user->id,
            'type' => 'expense',
            'amount' => '2500000.00',
        ]);
    }

    /** @test */
    public function test_income_sum_is_calculated_correctly_for_period(): void
    {
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $this->user->id, 'amount' => 3_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->income()->create(['user_id' => $this->user->id, 'amount' => 2_000_000, 'transaction_date' => '2026-10-20']);
        // Out-of-period – should NOT be counted
        Transaction::factory()->income()->create(['user_id' => $this->user->id, 'amount' => 9_999_999, 'transaction_date' => '2026-09-30']);

        $total = (float) Transaction::where('user_id', $this->user->id)
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');

        $this->assertEqualsWithDelta(5_000_000.0, $total, 0.01);
    }

    /** @test */
    public function test_expense_sum_is_calculated_correctly_for_period(): void
    {
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->expense()->create(['user_id' => $this->user->id, 'amount' => 1_500_000, 'transaction_date' => '2026-10-05']);
        Transaction::factory()->expense()->create(['user_id' => $this->user->id, 'amount' => 800_000, 'transaction_date' => '2026-10-15']);

        $total = (float) Transaction::where('user_id', $this->user->id)
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');

        $this->assertEqualsWithDelta(2_300_000.0, $total, 0.01);
    }

    /** @test */
    public function test_transaction_can_be_deleted(): void
    {
        $transaction = Transaction::factory()->create(['user_id' => $this->user->id]);

        $transaction->delete();

        $this->assertDatabaseMissing('transactions', ['id' => $transaction->id]);
    }

    /** @test */
    public function test_transaction_description_can_be_updated(): void
    {
        $transaction = Transaction::factory()->create([
            'user_id' => $this->user->id,
            'description' => 'Original description',
        ]);

        $transaction->update(['description' => 'Updated description']);

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'description' => 'Updated description',
        ]);
    }

    /** @test */
    public function test_net_cash_flow_equals_income_minus_expense(): void
    {
        $start = Carbon::create(2026, 10, 1)->startOfDay();
        $end = Carbon::create(2026, 10, 31)->endOfDay();

        Transaction::factory()->income()->create(['user_id' => $this->user->id, 'amount' => 8_000_000, 'transaction_date' => '2026-10-10']);
        Transaction::factory()->expense()->create(['user_id' => $this->user->id, 'amount' => 6_800_000, 'transaction_date' => '2026-10-15']);

        $income = (float) Transaction::where('user_id', $this->user->id)->income()->whereBetween('transaction_date', [$start, $end])->sum('amount');
        $expense = (float) Transaction::where('user_id', $this->user->id)->expense()->whereBetween('transaction_date', [$start, $end])->sum('amount');

        $this->assertEqualsWithDelta(1_200_000.0, $income - $expense, 0.01);
    }

    /** @test */
    public function test_transactions_belong_to_owner_via_scope(): void
    {
        $otherUser = User::factory()->create();
        Transaction::factory()->count(3)->create(['user_id' => $this->user->id]);
        Transaction::factory()->count(5)->create(['user_id' => $otherUser->id]);

        $myTransactions = Transaction::where('user_id', $this->user->id)->get();

        $this->assertCount(3, $myTransactions);
        $myTransactions->each(fn ($t) => $this->assertEquals($this->user->id, $t->user_id));
    }
}
