<?php

namespace App\Filament\Resources\TransactionCategories\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                TextInput::make('name')
                    ->label('Nama Kategori')
                    ->placeholder('Contoh: Penjualan Produk, Bahan Baku')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->label('Tipe Transaksi')
                    ->options([
                        'income' => 'Pemasukan (Income)',
                        'expense' => 'Pengeluaran (Expense)',
                    ])
                    ->required(),
                ColorPicker::make('color')
                    ->label('Warna Label')
                    ->default('#10b981'),
                TextInput::make('icon')
                    ->label('Nama Icon (Heroicon)')
                    ->placeholder('heroicon-o-tag')
                    ->default('heroicon-o-tag'),
            ]);
    }
}
