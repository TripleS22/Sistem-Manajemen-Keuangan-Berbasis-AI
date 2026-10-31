<?php

namespace Database\Seeders;

use App\Models\TransactionCategory;
use App\Models\User;
use App\Services\TenantShopService;
use Illuminate\Database\Seeder;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Seed kategori transaksi standar UMKM untuk akun demo.
     */
    public function run(): void
    {
        $categories = TenantShopService::getDefaultCategories();

        $users = User::all();

        foreach ($users as $user) {
            foreach ($categories as $category) {
                TransactionCategory::firstOrCreate(
                    ['user_id' => $user->id, 'name' => $category['name']],
                    $category
                );
            }
        }
    }
}
