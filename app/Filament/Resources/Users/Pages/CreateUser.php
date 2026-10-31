<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use App\Services\TenantShopService;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    /**
     * Auto-verify email for accounts created by admin.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['email_verified_at'] = now();

        return $data;
    }

    /**
     * Initialize default shop profile and categories if the user is an owner.
     */
    protected function afterCreate(): void
    {
        /** @var User $record */
        $record = $this->record;

        if ($record->isOwner()) {
            app(TenantShopService::class)->initializeShop($record);
        }
    }
}
