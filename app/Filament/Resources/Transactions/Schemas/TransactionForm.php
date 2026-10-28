<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                Select::make('type')
                    ->label('Jenis Transaksi')
                    ->options([
                        'income' => 'Pemasukan (+)',
                        'expense' => 'Pengeluaran (-)',
                    ])
                    ->default('expense')
                    ->required()
                    ->live(),
                Select::make('transaction_category_id')
                    ->label('Kategori')
                    ->relationship(
                        name: 'category',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn ($query, $get) => $query
                            ->where('user_id', auth()->id())
                            ->when($get('type'), fn ($q, $type) => $q->where('type', $type))
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        Hidden::make('user_id')
                            ->default(fn () => auth()->id()),
                        TextInput::make('name')
                            ->label('Nama Kategori')
                            ->required(),
                        Select::make('type')
                            ->label('Jenis')
                            ->options([
                                'income' => 'Pemasukan',
                                'expense' => 'Pengeluaran',
                            ])
                            ->required(),
                    ]),
                TextInput::make('amount')
                    ->label('Nominal (Rp)')
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(1)
                    ->placeholder('Contoh: 500000')
                    ->required(),
                DatePicker::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->default(now())
                    ->required(),
                Textarea::make('description')
                    ->label('Keterangan / Catatan')
                    ->placeholder('Rincian singkat transaksi...')
                    ->columnSpanFull(),
            ]);
    }
}
