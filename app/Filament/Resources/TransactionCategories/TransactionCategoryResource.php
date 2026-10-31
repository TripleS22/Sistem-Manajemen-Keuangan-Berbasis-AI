<?php

namespace App\Filament\Resources\TransactionCategories;

use App\Filament\Resources\TransactionCategories\Pages\CreateTransactionCategory;
use App\Filament\Resources\TransactionCategories\Pages\EditTransactionCategory;
use App\Filament\Resources\TransactionCategories\Pages\ListTransactionCategories;
use App\Filament\Resources\TransactionCategories\Schemas\TransactionCategoryForm;
use App\Filament\Resources\TransactionCategories\Tables\TransactionCategoriesTable;
use App\Models\TransactionCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class TransactionCategoryResource extends Resource
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'transaction-categories';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Kategori Transaksi';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Kelompokkan pos pemasukan dan pengeluaran agar pembukuan keuangan usaha tertata rapi.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Buat kategori pemasukan (Penjualan Produk, Jasa, Modal)',
            'Buat kategori pengeluaran (Bahan Baku, Gaji, Sewa, Operasional)',
            'Mudahkan pelacakan pos pengeluaran terbesar usaha',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 30;
    }

    protected static ?string $model = TransactionCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Transaksi';

    protected static ?string $navigationLabel = 'Kategori Transaksi';

    protected static ?string $modelLabel = 'Kategori Transaksi';

    protected static ?string $pluralModelLabel = 'Kategori Transaksi';

    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $tenantId = \App\Support\TenantContext::getActiveTenantId();

        return $query->where('user_id', $tenantId);
    }

    public static function form(Schema $schema): Schema
    {
        return TransactionCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransactionCategoriesTable::configure($table);
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
            'index' => ListTransactionCategories::route('/'),
            'create' => CreateTransactionCategory::route('/create'),
            'edit' => EditTransactionCategory::route('/{record}/edit'),
        ];
    }
}
