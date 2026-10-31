<?php

namespace App\Livewire;

use App\Support\TenantContext;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TenantSwitcher extends Component
{
    public ?int $selectedTenantId = null;

    public function mount(): void
    {
        $this->selectedTenantId = TenantContext::getActiveTenantId();
    }

    public function switchTenant(int $tenantId): void
    {
        TenantContext::setActiveTenantId($tenantId);
        $this->selectedTenantId = $tenantId;

        $this->dispatch('tenant-switched');
        $this->redirect(request()->header('Referer') ?: url('/admin'));
    }

    public function render(): View
    {
        $user = auth()->user();

        $activeProfile = TenantContext::getActiveBusinessProfile();
        $tenants = ($user && $user->isAdmin()) ? TenantContext::getAllTenants() : collect();

        return view('livewire.tenant-switcher', [
            'isAdmin' => (bool) $user?->isAdmin(),
            'activeProfile' => $activeProfile,
            'tenants' => $tenants,
            'selectedTenantId' => $this->selectedTenantId,
        ]);
    }
}

