<?php

namespace Database\Seeders;

use App\Models\BusinessProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class BusinessProfileSeeder extends Seeder
{
    /**
     * Seed profil usaha untuk akun demo.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@umkm.com')->firstOrFail();

        BusinessProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'business_name' => 'Kedai Kopi & Kuliner Berkah Nusantara',
                'business_type' => 'Kuliner & F&B',
                'description' => 'Usaha kuliner kopi artisan dan makanan ringan lokal khas nusantara. Melayani pelanggan walk-in dan pesanan katering.',
                'initial_capital' => 25_000_000,
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 45, Jakarta Selatan',
            ]
        );
    }
}
