<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\Register;
use App\Filament\Widgets\CashFlowChartWidget;
use App\Filament\Widgets\FinancialOverviewWidget;
use App\Filament\Widgets\RecentTransactionsWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use YacoubAlhaidari\FilamentTour\FilamentTourPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration(Register::class)
            ->passwordReset()
            ->profile()
            ->brandName('SIM Keuangan')
            ->colors([
                'primary' => Color::Emerald,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->navigationGroups([
                'Manajemen Transaksi',
                'Laporan & Analisis AI',
                'Pengaturan Usaha',
                'Manajemen Pengguna',
            ])
            ->plugins([
                FilamentTourPlugin::make()
                    ->showTourButton(true)
                    ->tourButtonIcon('heroicon-o-academic-cap')
                    ->tourButtonColor('primary')
                    ->tourButtonTooltip('Mulai Tur Panduan')
                    ->welcomeStep([
                        'id' => 'welcome',
                        'title' => 'Selamat Datang di SIM Keuangan AI! 👋',
                        'text' => '<strong>Sistem Manajemen Keuangan Cerdas untuk UMKM.</strong><br><br>Ikuti panduan interaktif ini untuk mengenal alur kerja dan seluruh fitur utama sistem, mulai dari pencatatan transaksi hingga analisis cerdas berbasis AI.',
                        'buttons' => [
                            ['text' => 'Lewati Panduan', 'action' => 'cancel', 'secondary' => true],
                            ['text' => 'Mulai Tur 🚀', 'action' => 'next', 'secondary' => false],
                        ],
                    ])
                    ->finishStep([
                        'id' => 'finish',
                        'title' => 'Panduan Selesai! 🎉',
                        'text' => '<strong>Anda siap mengelola keuangan usaha dengan lebih cerdas dan terarah.</strong><br><br>Lakukan pencatatan transaksi secara rutin untuk mendapatkan hasil prediksi Machine Learning dan rekomendasi AI yang semakin akurat.<br><br>Anda dapat memutar kembali panduan ini kapan saja melalui ikon topi toga 🎓 di pojok kanan atas.',
                        'buttons' => [
                            ['text' => 'Kembali', 'action' => 'back', 'secondary' => true],
                            ['text' => 'Mulai Sekarang 👍', 'action' => 'complete', 'secondary' => false],
                        ],
                    ]),
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => Blade::render('@include("filament.tour-theme")')
            )
            ->renderHook(
                PanelsRenderHook::GLOBAL_SEARCH_BEFORE,
                fn (): string => Blade::render('@livewire(\App\Livewire\TenantSwitcher::class)')
            )
            ->widgets([
                FinancialOverviewWidget::class,
                CashFlowChartWidget::class,
                RecentTransactionsWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
