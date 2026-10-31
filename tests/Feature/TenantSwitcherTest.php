<?php

namespace Tests\Feature;

use App\Models\BusinessProfile;
use App\Models\Transaction;
use App\Models\User;
use App\Support\TenantContext;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TenantSwitcherTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_admin_can_switch_tenant_and_see_different_store_data(): void
    {
        $admin = User::factory()->admin()->create(['name' => 'Super Admin', 'email' => 'admin@platform.com']);

        // Toko 1
        $owner1 = User::factory()->owner()->create(['name' => 'Budi', 'email' => 'budi@kopi.com']);
        $profile1 = BusinessProfile::create([
            'user_id' => $owner1->id,
            'business_name' => 'Kedai Kopi Berkah',
            'business_type' => 'Kuliner & F&B',
            'initial_capital' => 10000000,
        ]);
        $tx1 = Transaction::create([
            'user_id' => $owner1->id,
            'type' => 'income',
            'amount' => 500000,
            'transaction_date' => now()->toDateString(),
            'description' => 'Penjualan Kopi',
        ]);

        // Toko 2
        $owner2 = User::factory()->owner()->create(['name' => 'Siti', 'email' => 'siti@fashion.com']);
        $profile2 = BusinessProfile::create([
            'user_id' => $owner2->id,
            'business_name' => 'Butik Siti Cantik',
            'business_type' => 'Fashion & Konveksi',
            'initial_capital' => 20000000,
        ]);
        $tx2 = Transaction::create([
            'user_id' => $owner2->id,
            'type' => 'income',
            'amount' => 1500000,
            'transaction_date' => now()->toDateString(),
            'description' => 'Penjualan Baju',
        ]);

        // Login as Super Admin
        $this->actingAs($admin);

        // Switch to Toko 1
        TenantContext::setActiveTenantId($owner1->id);
        $this->assertEquals($owner1->id, TenantContext::getActiveTenantId());
        $this->assertEquals('Kedai Kopi Berkah', TenantContext::getActiveBusinessProfile()?->business_name);

        $visibleTx1 = Transaction::where('user_id', TenantContext::getActiveTenantId())->get();
        $this->assertTrue($visibleTx1->contains('id', $tx1->id));
        $this->assertFalse($visibleTx1->contains('id', $tx2->id));

        // Switch to Toko 2 via Livewire component
        Livewire::test(\App\Livewire\TenantSwitcher::class)
            ->call('switchTenant', $owner2->id);

        $this->assertEquals($owner2->id, TenantContext::getActiveTenantId());
        $this->assertEquals('Butik Siti Cantik', TenantContext::getActiveBusinessProfile()?->business_name);

        $visibleTx2 = Transaction::where('user_id', TenantContext::getActiveTenantId())->get();
        $this->assertTrue($visibleTx2->contains('id', $tx2->id));
        $this->assertFalse($visibleTx2->contains('id', $tx1->id));
    }

    public function test_owner_is_locked_to_their_own_store_and_cannot_switch_tenants(): void
    {
        $owner1 = User::factory()->owner()->create(['name' => 'Owner 1', 'email' => 'owner1@toko.com']);
        $owner2 = User::factory()->owner()->create(['name' => 'Owner 2', 'email' => 'owner2@toko.com']);

        $this->actingAs($owner1);

        // Even if session has another ID, owner always resolves to their own ID
        session([TenantContext::SESSION_KEY => $owner2->id]);
        $this->assertEquals($owner1->id, TenantContext::getActiveTenantId());
    }
}

