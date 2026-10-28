<?php

namespace App\Filament\Resources\FinancialAnalyses\Schemas;

use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FinancialAnalysisInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ringkasan Analisis')
                    ->description('Hasil klasifikasi kondisi keuangan oleh model Decision Tree')
                    ->icon('heroicon-o-sparkles')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('prediction_label')
                            ->label('Status Keuangan')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Sehat' => 'success',
                                'Perlu perhatian' => 'warning',
                                'Berisiko' => 'danger',
                                default => 'gray',
                            })
                            ->size(TextEntry\TextEntrySize::Large),

                        TextEntry::make('confidence_score')
                            ->label('Tingkat Kepercayaan Model')
                            ->formatStateUsing(fn ($state): string => round((float) $state * 100, 1).'%')
                            ->badge()
                            ->color('info'),

                        TextEntry::make('model_version')
                            ->label('Versi Model')
                            ->badge()
                            ->color('gray'),

                        TextEntry::make('period_start')
                            ->label('Awal Periode')
                            ->date('d M Y'),

                        TextEntry::make('period_end')
                            ->label('Akhir Periode')
                            ->date('d M Y'),

                        TextEntry::make('created_at')
                            ->label('Dianalisis Pada')
                            ->dateTime('d M Y, H:i'),
                    ]),

                Section::make('Data Keuangan Periode')
                    ->description('Angka yang digunakan sebagai fitur input model Decision Tree')
                    ->icon('heroicon-o-banknotes')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('total_income')
                            ->label('Total Pemasukan')
                            ->formatStateUsing(fn ($state): string => 'Rp '.number_format((float) $state, 0, ',', '.'))
                            ->color('success'),

                        TextEntry::make('total_expense')
                            ->label('Total Pengeluaran')
                            ->formatStateUsing(fn ($state): string => 'Rp '.number_format((float) $state, 0, ',', '.'))
                            ->color('danger'),

                        TextEntry::make('net_cash_flow')
                            ->label('Arus Kas Bersih')
                            ->formatStateUsing(fn ($state): string => 'Rp '.number_format((float) $state, 0, ',', '.'))
                            ->color(fn ($state): string => (float) $state >= 0 ? 'success' : 'danger'),

                        TextEntry::make('expense_ratio')
                            ->label('Rasio Pengeluaran')
                            ->formatStateUsing(fn ($state): string => round((float) $state * 100, 1).'%')
                            ->color(fn ($state): string => match (true) {
                                (float) $state <= 0.70 => 'success',
                                (float) $state <= 0.90 => 'warning',
                                default => 'danger',
                            }),

                        TextEntry::make('income_trend')
                            ->label('Tren Pemasukan')
                            ->formatStateUsing(fn ($state): string => ((float) $state >= 0 ? '+' : '').round((float) $state * 100, 1).'%')
                            ->color(fn ($state): string => (float) $state >= 0 ? 'success' : 'danger'),

                        TextEntry::make('cash_flow_trend')
                            ->label('Tren Arus Kas')
                            ->formatStateUsing(fn ($state): string => ((float) $state >= 0 ? '+' : '').round((float) $state * 100, 1).'%')
                            ->color(fn ($state): string => (float) $state >= 0 ? 'success' : 'danger'),
                    ]),

                Section::make('Faktor Penentu Klasifikasi')
                    ->description('Faktor utama yang memengaruhi hasil keputusan model Decision Tree')
                    ->icon('heroicon-o-list-bullet')
                    ->schema([
                        TextEntry::make('key_factors')
                            ->label('')
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->columnSpanFull(),
                    ]),

                Section::make('Penjelasan & Rekomendasi AI')
                    ->description('Interpretasi hasil analisis oleh Gemini AI — bukan perhitungan ulang, hanya penjelasan')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->relationship('explanation')
                    ->schema([
                        TextEntry::make('provider')
                            ->label('Penyedia AI')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'gemini' => 'Gemini AI',
                                'rule_based_fallback' => 'Aturan Otomatis (Fallback)',
                                default => $state,
                            })
                            ->color(fn (string $state): string => match ($state) {
                                'gemini' => 'info',
                                'rule_based_fallback' => 'warning',
                                default => 'gray',
                            }),

                        TextEntry::make('status')
                            ->label('Status Permintaan')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'success' => 'success',
                                'fallback' => 'warning',
                                'error' => 'danger',
                                default => 'gray',
                            }),

                        TextEntry::make('explanation')
                            ->label('Penjelasan Kondisi Keuangan')
                            ->columnSpanFull()
                            ->prose(),

                        TextEntry::make('recommendations')
                            ->label('Rekomendasi Tindakan')
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
