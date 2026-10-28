<?php

namespace Database\Seeders;

use App\Models\TransactionCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Seed kategori transaksi standar UMKM untuk akun demo.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@umkm.com')->firstOrFail();

        $categories = [
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
                'name' => 'Pembelian Bahan Baku',
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

        foreach ($categories as $category) {
            TransactionCategory::firstOrCreate(
                ['user_id' => $user->id, 'name' => $category['name']],
                $category
            );
        }
    }
}
