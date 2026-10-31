<?php

namespace App\Support;

use Carbon\Carbon;
use Carbon\CarbonInterface;

class DashboardPeriod
{
    /**
     * Resolve the dashboard period filter into a concrete date range.
     *
     * @return array{start: CarbonInterface, end: CarbonInterface, label: string}
     */
    public static function resolve(?string $period): array
    {
        $now = Carbon::now();

        return match ($period) {
            'last_month' => [
                'start' => $now->copy()->subMonth()->startOfMonth()->startOfDay(),
                'end' => $now->copy()->subMonth()->endOfMonth()->endOfDay(),
                'label' => $now->copy()->subMonth()->translatedFormat('F Y'),
            ],
            'last_30_days' => [
                'start' => $now->copy()->subDays(29)->startOfDay(),
                'end' => $now->copy()->endOfDay(),
                'label' => $now->copy()->subDays(29)->translatedFormat('d M Y').' - '.$now->translatedFormat('d M Y'),
            ],
            'this_year' => [
                'start' => $now->copy()->startOfYear()->startOfDay(),
                'end' => $now->copy()->endOfYear()->endOfDay(),
                'label' => $now->translatedFormat('Y'),
            ],
            default => [
                'start' => $now->copy()->startOfMonth()->startOfDay(),
                'end' => $now->copy()->endOfMonth()->endOfDay(),
                'label' => $now->translatedFormat('F Y'),
            ],
        };
    }

    /**
     * Options for the dashboard period filter form.
     *
     * @return array<string, string>
     */
    public static function options(): array
    {
        return [
            'this_month' => 'Bulan Ini',
            'last_month' => 'Bulan Lalu',
            'last_30_days' => '30 Hari Terakhir',
            'this_year' => 'Tahun Ini',
        ];
    }
}
