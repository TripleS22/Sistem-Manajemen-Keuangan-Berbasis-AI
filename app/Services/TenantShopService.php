<?php

namespace App\Services;

use App\Models\BusinessProfile;
use App\Models\User;

class TenantShopService
{
    /**
     * Get the standard list of default transaction categories for a new UMKM shop.
     *
     * @return array<int, array{name: string, type: string, color: string, icon: string}>
     */
    public static function getDefaultCategories(): array
    {
        return [
            // Pemasukan
            [
                'name' => 'Penjualan Produk',
                'type' => 'income',
                'color' => '#10b981',
                'icon' => 'heroicon-o-shopping-bag',
            ],
            [
                'name' => 'Pendapatan Jasa / Katering',
                'type' => 'income',
                'color' => '#06b6d4',
                'icon' => 'heroicon-o-briefcase',
            ],
            [
                'name' => 'Pendapatan Lain-lain',
                'type' => 'income',
                'color' => '#3b82f6',
                'icon' => 'heroicon-o-plus-circle',
            ],
            [
                'name' => 'Modal / Investasi Masuk',
                'type' => 'income',
                'color' => '#8b5cf6',
                'icon' => 'heroicon-o-banknotes',
            ],

            // Pengeluaran
            [
                'name' => 'Pembelian Bahan Baku & Kulakan',
                'type' => 'expense',
                'color' => '#ef4444',
                'icon' => 'heroicon-o-archive-box',
            ],
            [
                'name' => 'Gaji & Upah Karyawan',
                'type' => 'expense',
                'color' => '#f97316',
                'icon' => 'heroicon-o-user-group',
            ],
            [
                'name' => 'Sewa Tempat & Utilitas (Listrik/Air/Internet)',
                'type' => 'expense',
                'color' => '#f59e0b',
                'icon' => 'heroicon-o-home-modern',
            ],
            [
                'name' => 'Operasional & Perlengkapan',
                'type' => 'expense',
                'color' => '#64748b',
                'icon' => 'heroicon-o-cog-6-tooth',
            ],
            [
                'name' => 'Pemasaran & Promosi',
                'type' => 'expense',
                'color' => '#ec4899',
                'icon' => 'heroicon-o-megaphone',
            ],
            [
                'name' => 'Transportasi & Logistik',
                'type' => 'expense',
                'color' => '#a855f7',
                'icon' => 'heroicon-o-truck',
            ],
        ];
    }

    /**
     * Initialize shop profile and default categories for an UMKM owner.
     */
    public function initializeShop(
        User $user,
        ?string $businessName = null,
        ?string $businessType = null,
        float $initialCapital = 0
    ): BusinessProfile {
        $resolvedName = filled($businessName) ? trim($businessName) : "Toko {$user->name}";

        $profile = BusinessProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'business_name' => $resolvedName,
                'business_type' => $businessType ?: 'Retail & Perdagangan',
                'initial_capital' => $initialCapital,
            ]
        );

        $this->initializeDefaultCategories($user);

        return $profile;
    }

    /**
     * Seed default categories for a user if they do not exist yet.
     */
    public function initializeDefaultCategories(User $user): void
    {
        if ($user->transactionCategories()->exists()) {
            return;
        }

        foreach (self::getDefaultCategories() as $category) {
            $user->transactionCategories()->create($category);
        }
    }
}
