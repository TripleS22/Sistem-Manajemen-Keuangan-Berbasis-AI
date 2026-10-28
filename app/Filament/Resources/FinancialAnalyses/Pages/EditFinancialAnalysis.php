<?php

namespace App\Filament\Resources\FinancialAnalyses\Pages;

use App\Filament\Resources\FinancialAnalyses\FinancialAnalysisResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFinancialAnalysis extends EditRecord
{
    protected static string $resource = FinancialAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
