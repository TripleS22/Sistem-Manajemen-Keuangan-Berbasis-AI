<?php

namespace Tests\Feature;

use App\Filament\Pages\Auth\Register;
use App\Models\BusinessProfile;
use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\User;
use App\Services\TenantShopService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TenantRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_user_registration_creates_owner_shop_profile_and_default_categories(): void
    {
        $userData = [
            'name' => 'Budi Santoso',
            'business_name' => 'Kopi Mantap Jiwa',
            'email' => 'budi@kopimantap.com',
            'password' => 'password123',
            'passwordConfirmation' => 'password123',
        ];

        Livewire::test(Register::class)
            ->fillForm($userData)
            ->call('register')
            ->assertHasNoFormErrors();

        // 1. User created with owner role
        $user = User::where('email', 'budi@kopimantap.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('owner', $user->role);
        $this->assertTrue($user->isOwner());
        $this->assertFalse($user->isAdmin());

        // 2. Business profile created
        $profile = BusinessProfile::where('user_id', $user->id)->first();
        $this->assertNotNull($profile);
        $this->assertEquals('Kopi Mantap Jiwa', $profile->business_name);

        // 3. Default categories seeded
        $categoriesCount = TransactionCategory::where('user_id', $user->id)->count();
        $this->assertGreaterThan(0, $categoriesCount);
        $this->assertEquals(count(TenantShopService::getDefaultCategories()), $categoriesCount);

        $incomeCat = TransactionCategory::where('user_id', $user->id)->where('type', 'income')->first();
        $this->assertNotNull($incomeCat);

        $expenseCat = TransactionCategory::where('user_id', $user->id)->where('type', 'expense')->first();
        $this->assertNotNull($expenseCat);
    }

    public function test_each_tenant_data_is_isolated(): void
    {
        // Tenant 1 (Toko A)
        $ownerA = User::factory()->owner()->create(['name' => 'Owner A', 'email' => 'a@toko.com']);
        app(TenantShopService::class)->initializeShop($ownerA, 'Toko A');
        $catA = $ownerA->transactionCategories()->where('type', 'income')->first();
        $txA = Transaction::create([
            'user_id' => $ownerA->id,
            'transaction_category_id' => $catA?->id,
            'type' => 'income',
            'amount' => 1000000,
            'transaction_date' => now()->toDateString(),
            'description' => 'Penjualan Toko A',
        ]);

        // Tenant 2 (Toko B)
        $ownerB = User::factory()->owner()->create(['name' => 'Owner B', 'email' => 'b@toko.com']);
        app(TenantShopService::class)->initializeShop($ownerB, 'Toko B');
        $catB = $ownerB->transactionCategories()->where('type', 'income')->first();
        $txB = Transaction::create([
            'user_id' => $ownerB->id,
            'transaction_category_id' => $catB?->id,
            'type' => 'income',
            'amount' => 500000,
            'transaction_date' => now()->toDateString(),
            'description' => 'Penjualan Toko B',
        ]);

        // Acting as Owner A
        $this->actingAs($ownerA);

        $visibleTxA = Transaction::query()->where('user_id', auth()->id())->pluck('id');
        $this->assertTrue($visibleTxA->contains($txA->id));
        $this->assertFalse($visibleTxA->contains($txB->id));

        // Acting as Owner B
        $this->actingAs($ownerB);

        $visibleTxB = Transaction::query()->where('user_id', auth()->id())->pluck('id');
        $this->assertTrue($visibleTxB->contains($txB->id));
        $this->assertFalse($visibleTxB->contains($txA->id));
    }
}
