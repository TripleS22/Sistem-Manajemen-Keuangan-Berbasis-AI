<?php

namespace App\Filament\Resources\FinancialAnalyses\Pages;

use App\Filament\Resources\FinancialAnalyses\FinancialAnalysisResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFinancialAnalysis extends ViewRecord
{
    protected static string $resource = FinancialAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
