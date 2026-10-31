<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use App\Support\DashboardPeriod;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\TableWidget;

class RecentTransactionsWidget extends TableWidget
{
    use InteractsWithPageFilters;

    protected static ?bool $isLazyLoaded = false;

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function getTableHeading(): string
    {
        $period = DashboardPeriod::resolve($this->pageFilters['period'] ?? 'this_month');

        return 'Transaksi Terbaru — '.$period['label'];
    }

    public function table(Table $table): Table
    {
        $period = DashboardPeriod::resolve($this->pageFilters['period'] ?? 'this_month');
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();

        return $table
            ->query(
                Transaction::query()
                    ->where('user_id', $userId)
                    ->whereBetween('transaction_date', [$period['start'], $period['end']])
                    ->orderByDesc('transaction_date')
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('transaction_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'income' => 'success',
                        'expense' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'income' => 'Pemasukan',
                        'expense' => 'Pengeluaran',
                        default => $state,
                    }),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->placeholder('—'),
                TextColumn::make('description')
                    ->label('Keterangan')
                    ->limit(40)
                    ->placeholder('—'),
                TextColumn::make('amount')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id')
                    ->weight('bold')
                    ->color(fn ($record): string => $record->type === 'income' ? 'success' : 'danger'),
            ])
            ->paginated(false)
            ->emptyStateHeading('Belum ada transaksi pada periode ini')
            ->emptyStateDescription('Transaksi lima terakhir pada periode terpilih akan tampil di sini.');
    }
}
