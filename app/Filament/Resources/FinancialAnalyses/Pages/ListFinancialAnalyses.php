<?php

namespace App\Filament\Resources\FinancialAnalyses\Pages;

use App\Filament\Resources\FinancialAnalyses\FinancialAnalysisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFinancialAnalyses extends ListRecords
{
    protected static string $resource = FinancialAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Jalankan Analisis AI')
                ->icon('heroicon-o-sparkles')
                ->color('primary'),
        ];
    }
}
