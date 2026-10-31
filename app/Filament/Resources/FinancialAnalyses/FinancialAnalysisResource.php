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
use UnitEnum;
use YacoubAlhaidari\FilamentTour\Concerns\HasTourSteps;

class FinancialAnalysisResource extends Resource
{
    use HasTourSteps;

    public static function getTourStepId(): ?string
    {
        return 'financial-analyses';
    }

    public static function getTourStepTitle(): ?string
    {
        return 'Analisis Keuangan AI';
    }

    public static function getTourStepDescription(): ?string
    {
        return 'Fitur unggulan untuk menganalisis kesehatan finansial UMKM secara otomatis dengan Machine Learning & AI LLM.';
    }

    public static function getTourStepFeatures(): array
    {
        return [
            'Klasifikasi kondisi bisnis (Sehat, Perlu Perhatian, Berisiko) via Decision Tree',
            'Penjelasan naratif cerdas dan rekomendasi taktis dari LLM AI (Groq / Gemini)',
            'Transparansi faktor penentu (*key factors*) dan tingkat keyakinan (*confidence score*)',
        ];
    }

    public static function getTourStepSort(): int
    {
        return 50;
    }

    protected static ?string $model = FinancialAnalysis::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|UnitEnum|null $navigationGroup = 'Laporan & Analisis AI';

    protected static ?string $navigationLabel = 'Analisis Keuangan AI';

    protected static ?string $modelLabel = 'Analisis Keuangan';

    protected static ?string $pluralModelLabel = 'Riwayat Analisis AI';

    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $tenantId = \App\Support\TenantContext::getActiveTenantId();

        return $query->where('user_id', $tenantId);
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
