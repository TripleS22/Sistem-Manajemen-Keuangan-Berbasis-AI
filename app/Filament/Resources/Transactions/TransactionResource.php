<?php

namespace App\Filament\Resources\Transactions;

use App\Filament\Resources\Transactions\Pages\CreateTransaction;
use App\Filament\Resources\Transactions\Pages\EditTransaction;
use App\Filament\Resources\Transactions\Pages\ListTransactions;
use App\Filament\Resources\Transactions\Schemas\TransactionForm;
use App\Filament\Resources\Transactions\Tables\TransactionsTable;
use App\Models\Transaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class TransactionResource extends Resource
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'transactions';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Pencatatan Transaksi Harian';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Catat setiap arus kas masuk dan keluar harian yang terjadi dalam aktivitas bisnis UMKM Anda.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Tambah transaksi pemasukan atau pengeluaran secara cepat',
            'Tentukan tanggal, kategori, dan rincian deskripsi transaksi',
            'Filter dan cari riwayat transaksi secara terperinci',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 40;
    }

    protected static ?string $model = Transaction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $navigationLabel = 'Transaksi';

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Transaksi';

    protected static ?string $modelLabel = 'Transaksi';

    protected static ?string $pluralModelLabel = 'Daftar Transaksi';

    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $tenantId = \App\Support\TenantContext::getActiveTenantId();

        return $query->where('user_id', $tenantId);
    }

    public static function form(Schema $schema): Schema
    {
        return TransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransactionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransactions::route('/'),
            'create' => CreateTransaction::route('/create'),
            'edit' => EditTransaction::route('/{record}/edit'),
        ];
    }
}
