<?php

use App\Http\Controllers\FinancialReportPrintController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/laporan/cetak', FinancialReportPrintController::class)
    ->middleware('auth')
    ->name('reports.print');
