<?php

namespace App\Filament\Pages;

use App\Support\DashboardPeriod;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Schema;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'dashboard';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Dashboard Ringkasan Keuangan';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Pusat ringkasan kondisi finansial bisnis Anda dengan grafik visual dan kartu statistik penting.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Pantau total pemasukan, pengeluaran, dan laba bersih secara real-time',
            'Grafik tren arus kas bulanan yang dinamis',
            'Tinjau daftar transaksi terbaru usaha Anda',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 10;
    }

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Select::make('period')
                    ->label('Periode')
                    ->options(DashboardPeriod::options())
                    ->default('this_month')
                    ->native(false)
                    ->columnSpan(1),
            ]);
    }
}
