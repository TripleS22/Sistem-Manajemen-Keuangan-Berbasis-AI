<?php

namespace App\Support;

use App\Models\BusinessProfile;
use App\Models\User;
use Illuminate\Support\Collection;

class TenantContext
{
    public const SESSION_KEY = 'admin_active_tenant_id';

    /**
     * Get the active tenant user ID (Owner ID).
     */
    public static function getActiveTenantId(): ?int
    {
        $user = auth()->user();

        if (! $user) {
            return null;
        }

        // If the logged in user is a regular UMKM owner, they can only access their own store
        if ($user->isOwner()) {
            return $user->id;
        }

        // For Super Admin: check if a specific tenant is selected in the session
        $selectedId = session(self::SESSION_KEY);

        if ($selectedId && User::where('id', $selectedId)->where('role', 'owner')->exists()) {
            return (int) $selectedId;
        }

        // Default to the first UMKM owner registered
        $firstOwner = User::where('role', 'owner')->orderBy('id')->first();

        if ($firstOwner) {
            session([self::SESSION_KEY => $firstOwner->id]);

            return $firstOwner->id;
        }

        return $user->id;
    }

    /**
     * Get the active tenant User model.
     */
    public static function getActiveTenantUser(): ?User
    {
        $tenantId = self::getActiveTenantId();

        return $tenantId ? User::find($tenantId) : null;
    }

    /**
     * Get the active tenant BusinessProfile model.
     */
    public static function getActiveBusinessProfile(): ?BusinessProfile
    {
        $tenantId = self::getActiveTenantId();

        if (! $tenantId) {
            return null;
        }

        return BusinessProfile::firstOrCreate(
            ['user_id' => $tenantId],
            [
                'business_name' => 'Toko UMKM ' . $tenantId,
                'business_type' => 'Retail & Perdagangan',
                'initial_capital' => 0,
            ]
        );
    }

    /**
     * Switch active tenant for Super Admin.
     */
    public static function setActiveTenantId(int $userId): void
    {
        if (User::where('id', $userId)->where('role', 'owner')->exists()) {
            session([self::SESSION_KEY => $userId]);
        }
    }

    /**
     * Get list of all available UMKM tenants.
     *
     * @return Collection<int, User>
     */
    public static function getAllTenants(): Collection
    {
        return User::where('role', 'owner')
            ->with('businessProfile')
            ->orderBy('name')
            ->get();
    }
}

