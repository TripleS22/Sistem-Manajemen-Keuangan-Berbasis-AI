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
        // Pastikan akun admin tidak memiliki profil toko palsu
        BusinessProfile::whereIn('user_id', User::where('role', 'admin')->pluck('id'))->delete();

        $owners = User::where('role', 'owner')->get();

        foreach ($owners as $user) {
            BusinessProfile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'business_name' => $user->email === 'admin@umkm.com'
                        ? 'Kedai Kopi & Kuliner Berkah Nusantara'
                        : 'Toko Berkah Jaya '.$user->name,
                    'business_type' => $user->email === 'admin@umkm.com'
                        ? 'Kuliner & F&B'
                        : 'Retail & Perdagangan',
                    'description' => $user->email === 'admin@umkm.com'
                        ? 'Usaha kuliner kopi artisan dan makanan ringan lokal khas nusantara. Melayani pelanggan walk-in dan pesanan katering.'
                        : 'Usaha perdagangan retail kebutuhan harian, sembako, dan aneka perlengkapan rumah tangga dengan pelayanan prima.',
                    'initial_capital' => 25_000_000,
                    'phone' => '081234567890',
                    'address' => 'Jl. Merdeka No. 45, Jakarta Selatan',
                ]
            );
        }
    }
}
