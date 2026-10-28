<?php

namespace App\Filament\Resources\FinancialAnalyses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FinancialAnalysisForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Pilih Periode Analisis')
                    ->description('Sistem akan menghitung otomatis seluruh pemasukan, pengeluaran, rasio keuangan, dan tren arus kas dari data transaksi Anda.')
                    ->columns(2)
                    ->schema([
                        DatePicker::make('period_start')
                            ->label('Tanggal Mulai Periode')
                            ->default(now()->startOfMonth())
                            ->required(),
                        DatePicker::make('period_end')
                            ->label('Tanggal Selesai Periode')
                            ->default(now())
                            ->required(),
                    ]),
            ]);
    }
}
