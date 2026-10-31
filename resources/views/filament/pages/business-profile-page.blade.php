<x-filament-panels::page>

    @php
        $profile = \App\Support\TenantContext::getActiveBusinessProfile();
        $businessTypes = [
            'Kuliner & F&B'            => 'Kuliner & Makanan / Minuman (F&B)',
            'Retail & Perdagangan'     => 'Retail, Toko Kelontong & Minimarket',
            'Fashion & Konveksi'       => 'Fashion, Pakaian & Aksesori',
            'Jasa & Konsultasi'        => 'Jasa, Perbaikan & Layanan',
            'Kerajinan & Kriya'        => 'Kerajinan Tangan, Kriya & Seni',
            'Pertanian & Peternakan'   => 'Pertanian, Perkebunan & Peternakan',
            'Teknologi & Digital'      => 'Teknologi & Agensi Digital',
            'Lainnya'                  => 'Lainnya',
        ];
        $businessTypeLabel = $profile ? ($businessTypes[$profile->business_type] ?? $profile->business_type) : '—';
    @endphp

    <style>
        .biz-profile-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }
        .dark .biz-profile-card {
            background-color: #18181b;
            border-color: #27272a;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        }
        @media (max-width: 640px) {
            .biz-profile-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }

        .biz-avatar {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
        }

        .biz-content {
            flex: 1;
            min-width: 0;
            width: 100%;
        }

        .biz-header-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .biz-title-wrap {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .biz-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
            margin: 0;
            line-height: 1.3;
        }
        .dark .biz-title {
            color: #f8fafc;
        }

        .biz-description {
            font-size: 0.875rem;
            color: #475569;
            line-height: 1.6;
            margin-top: 8px;
            margin-bottom: 0;
        }
        .dark .biz-description {
            color: #cbd5e1;
        }

        .biz-details-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }
        .dark .biz-details-bar {
            border-top-color: #27272a;
        }

        .biz-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.8125rem;
            color: #334155;
            font-weight: 500;
        }
        .dark .biz-chip {
            background-color: #202024;
            border-color: #27272a;
            color: #cbd5e1;
        }

        .biz-chip-accent {
            background-color: #ecfdf5;
            border-color: #a7f3d0;
            color: #065f46;
            font-weight: 600;
        }
        .dark .biz-chip-accent {
            background-color: #064e3b/30;
            border-color: #065f46;
            color: #34d399;
        }
    </style>

    @if(auth()->user()?->isAdmin() && $currentTenant = \App\Support\TenantContext::getActiveTenantUser())
        <div style="margin-bottom: 16px; padding: 12px 18px; background-color: rgba(245, 158, 11, 0.12); border: 1px solid rgba(245, 158, 11, 0.35); border-radius: 12px; display: flex; align-items: center; justify-content: space-between; gap: 12px; font-size: 0.875rem;" class="text-amber-900 dark:text-amber-200">
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 1.25rem;">🏪</span>
                <span><strong>Mode Super Admin:</strong> Anda sedang melihat & mengelola SIM Keuangan Toko <strong>{{ $profile?->business_name }}</strong> (Owner: {{ $currentTenant->name }} — {{ $currentTenant->email }})</span>
            </div>
            <span style="font-size: 0.75rem; font-weight: 600;" class="text-amber-700 dark:text-amber-400">Pilih toko lain via dropdown di navigasi atas</span>
        </div>
    @endif

    {{-- Kartu Ringkasan Profil Saat Ini --}}
    @if($profile && $profile->business_name)
        <div class="biz-profile-card">
            {{-- Ikon / Avatar Toko --}}
            <div class="biz-avatar">
                <x-filament::icon icon="heroicon-o-building-storefront" class="w-8 h-8" />
            </div>

            {{-- Informasi Pokok --}}
            <div class="biz-content">
                <div class="biz-header-row">
                    <div class="biz-title-wrap">
                        <h2 class="biz-title">{{ $profile->business_name }}</h2>
                        <x-filament::badge color="primary" size="sm">
                            {{ $businessTypeLabel }}
                        </x-filament::badge>
                    </div>

                    @if($profile->updated_at)
                        <span class="text-xs text-gray-400 dark:text-gray-500 font-medium">
                            Diperbarui {{ $profile->updated_at->diffForHumans() }}
                        </span>
                    @endif
                </div>

                @if($profile->description)
                    <p class="biz-description">
                        {{ $profile->description }}
                    </p>
                @endif

                {{-- Detail Tambahan (Pill Chips) --}}
                <div class="biz-details-bar">
                    @if($profile->phone)
                        <div class="biz-chip">
                            <x-filament::icon icon="heroicon-o-phone" class="w-4 h-4 text-gray-400 dark:text-gray-500" />
                            <span>{{ $profile->phone }}</span>
                        </div>
                    @endif

                    @if($profile->address)
                        <div class="biz-chip">
                            <x-filament::icon icon="heroicon-o-map-pin" class="w-4 h-4 text-gray-400 dark:text-gray-500" />
                            <span>{{ Str::limit($profile->address, 65) }}</span>
                        </div>
                    @endif

                    @if($profile->initial_capital)
                        <div class="biz-chip biz-chip-accent">
                            <x-filament::icon icon="heroicon-o-banknotes" class="w-4 h-4" />
                            <span>Modal Awal: Rp {{ number_format((float) $profile->initial_capital, 0, ',', '.') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        {{-- Petunjuk untuk profil baru --}}
        <div class="biz-profile-card" style="justify-content: center; text-align: center; padding: 36px 20px;">
            <div style="display: flex; flex-direction: column; align-items: center; gap: 12px;">
                <div class="biz-avatar">
                    <x-filament::icon icon="heroicon-o-building-storefront" class="w-8 h-8" />
                </div>
                <div>
                    <h3 class="biz-title" style="font-size: 1.1rem;">Lengkapi Profil UMKM Anda</h3>
                    <p class="biz-description" style="margin-top: 4px;">
                        Isi informasi usaha di bawah ini agar analisis AI lebih akurat dan relevan.
                    </p>
                </div>
            </div>
        </div>
    @endif

    {{-- Form Profil --}}
    <form wire:submit="save" class="space-y-6">
        {{ $this->form }}

        <div style="display: flex; justify-content: flex-end; margin-top: 18px;">
            <x-filament::button
                type="submit"
                icon="heroicon-o-check"
                color="primary"
                size="md"
            >
                Simpan Perubahan
            </x-filament::button>
        </div>
    </form>

</x-filament-panels::page>
