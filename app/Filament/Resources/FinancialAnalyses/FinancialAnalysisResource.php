<?php

namespace App\Filament\Resources\FinancialAnalyses;

use App\Filament\Resources\FinancialAnalyses\Pages\CreateFinancialAnalysis;
use App\Filament\Resources\FinancialAnalyses\Pages\EditFinancialAnalysis;
use App\Filament\Resources\FinancialAnalyses\Pages\ListFinancialAnalyses;
use App\Filament\Resources\FinancialAnalyses\Pages\ViewFinancialAnalysis;
use App\Filament\Resources\FinancialAnalyses\Schemas\FinancialAnalysisForm;
use App\Filament\Resources\FinancialAnalyses\Schemas\FinancialAnalysisInfolist;
use App\Filament\Resources\FinancialAnalyses\Tables\FinancialAnalysesTable;
use App\Models\FinancialAnalysis;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FinancialAnalysisResource extends Resource
{
    protected static ?string $model = FinancialAnalysis::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $navigationLabel = 'Analisis Keuangan AI';

    protected static ?string $modelLabel = 'Analisis Keuangan';

    protected static ?string $pluralModelLabel = 'Riwayat Analisis AI';

    protected static ?int $navigationSort = 40;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
    }

    public static function form(Schema $schema): Schema
    {
        return FinancialAnalysisForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FinancialAnalysisInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FinancialAnalysesTable::configure($table);
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
            'index' => ListFinancialAnalyses::route('/'),
            'create' => CreateFinancialAnalysis::route('/create'),
            'view' => ViewFinancialAnalysis::route('/{record}'),
            'edit' => EditFinancialAnalysis::route('/{record}/edit'),
        ];
    }
}
