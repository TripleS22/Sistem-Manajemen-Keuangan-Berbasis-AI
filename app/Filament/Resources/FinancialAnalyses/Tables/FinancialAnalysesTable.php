<?php

namespace App\Filament\Resources\FinancialAnalyses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FinancialAnalysesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('period_start')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('period_end')
                    ->label('Selesai')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('net_cash_flow')
                    ->label('Arus Kas Bersih')
                    ->money('IDR', locale: 'id')
                    ->weight('bold')
                    ->color(fn ($state): string => $state >= 0 ? 'success' : 'danger')
                    ->sortable(),
                TextColumn::make('expense_ratio')
                    ->label('Rasio Biaya')
                    ->formatStateUsing(fn ($state) => number_format((float) $state * 100, 1).'%')
                    ->sortable(),
                TextColumn::make('prediction_label')
                    ->label('Status Keuangan (ML)')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'sehat' => 'success',
                        'perlu perhatian' => 'warning',
                        'berisiko' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('confidence_score')
                    ->label('Akurasi/Skor')
                    ->formatStateUsing(fn ($state) => $state ? number_format((float) $state * 100, 1).'%' : '—')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Waktu Analisis')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
