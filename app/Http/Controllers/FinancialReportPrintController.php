<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfile;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FinancialReportPrintController extends Controller
{
    /**
     * Render a print-friendly financial report for the current user's transactions.
     */
    public function __invoke(Request $request): View
    {
        $userId = \App\Support\TenantContext::getActiveTenantId() ?? auth()->id();

        $start = $request->filled('start')
            ? Carbon::parse($request->query('start'))->startOfDay()
            : Carbon::now()->startOfDay();
        $end = $request->filled('end')
            ? Carbon::parse($request->query('end'))->endOfDay()
            : Carbon::now()->endOfDay();

        $transactions = Transaction::with('category')
            ->where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end])
            ->orderBy('transaction_date')
            ->get();

        $totalIncome = (float) $transactions->where('type', 'income')->sum('amount');
        $totalExpense = (float) $transactions->where('type', 'expense')->sum('amount');

        $categoryBreakdown = [];
        foreach ($transactions as $tx) {
            $key = ($tx->type === 'income' ? 'income' : 'expense').'|'.($tx->category?->name ?? 'Tanpa Kategori');
            if (! isset($categoryBreakdown[$key])) {
                $categoryBreakdown[$key] = [
                    'name' => $tx->category?->name ?? 'Tanpa Kategori',
                    'type' => $tx->type,
                    'total' => 0,
                    'count' => 0,
                ];
            }
            $categoryBreakdown[$key]['total'] += (float) $tx->amount;
            $categoryBreakdown[$key]['count']++;
        }

        return view('reports.financial-print', [
            'businessProfile' => BusinessProfile::where('user_id', $userId)->first(),
            'startDate' => $start->format('d M Y'),
            'endDate' => $end->format('d M Y'),
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'netCashFlow' => $totalIncome - $totalExpense,
            'categoryBreakdown' => array_values($categoryBreakdown),
            'transactions' => $transactions,
            'printedAt' => Carbon::now()->translatedFormat('d M Y, H:i'),
        ]);
    }
}
