<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use App\Support\TenantContext;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Pemilik')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('businessProfile.business_name')
                    ->label('Nama Toko / UMKM')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-building-storefront')
                    ->placeholder('Belum Diatur'),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-envelope'),
                TextColumn::make('role')
                    ->label('Peran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'warning',
                        'owner' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'admin' => 'Admin Platform',
                        'owner' => 'Pemilik Toko UMKM',
                        default => $state,
                    }),
                TextColumn::make('email_verified_at')
                    ->label('Terverifikasi')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->placeholder('Belum Terverifikasi'),
                TextColumn::make('created_at')
                    ->label('Terdaftar Sejak')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Peran')
                    ->options([
                        'owner' => 'Pemilik Toko UMKM',
                        'admin' => 'Admin Platform',
                    ]),
            ])
            ->recordActions([
                Action::make('switch_tenant')
                    ->label('Buka SIM Toko 🚀')
                    ->icon('heroicon-o-arrow-right-circle')
                    ->color('success')
                    ->action(function (User $record) {
                        TenantContext::setActiveTenantId($record->id);

                        return redirect('/admin');
                    })
                    ->visible(fn (User $record) => $record->isOwner()),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
