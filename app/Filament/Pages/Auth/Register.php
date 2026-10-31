<?php

namespace App\Filament\Pages\Auth;

use App\Services\TenantShopService;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use SensitiveParameter;

class Register extends BaseRegister
{
    public function getHeading(): string|Htmlable|null
    {
        return 'Daftar Toko UMKM Baru';
    }

    public function getSubheading(): string|Htmlable|null
    {
        return 'Daftarkan toko UMKM Anda untuk mulai mencatat keuangan dan memperoleh analisis AI.';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent()
                    ->label('Nama Pemilik Usaha')
                    ->placeholder('Contoh: Budi Santoso'),
                $this->getBusinessNameFormComponent(),
                $this->getEmailFormComponent()
                    ->label('Alamat Email')
                    ->placeholder('owner@tokoanda.com'),
                $this->getPasswordFormComponent()
                    ->label('Password'),
                $this->getPasswordConfirmationFormComponent()
                    ->label('Konfirmasi Password'),
            ]);
    }

    protected function getBusinessNameFormComponent(): Component
    {
        return TextInput::make('business_name')
            ->label('Nama Toko / Usaha UMKM')
            ->placeholder('Contoh: Kedai Kopi Berkah')
            ->required()
            ->maxLength(255);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    protected function handleRegistration(#[SensitiveParameter] array $data): Model
    {
        $businessName = $data['business_name'] ?? null;
        unset($data['business_name']);

        $data['role'] = 'owner';

        $user = $this->getUserModel()::create($data);

        app(TenantShopService::class)->initializeShop($user, $businessName);

        return $user;
    }
}
