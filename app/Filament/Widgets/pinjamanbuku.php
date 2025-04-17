<?php

namespace App\Filament\Widgets;

use App\Models\Peminjam;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class pinjamanbuku extends ChartWidget
{
    protected static ?string $heading = 'Data Peminjaman Buku';
    
    // Add polling to refresh the data automatically
    protected static ?string $pollingInterval = '10s';

    protected function getData(): array
    {
        $data = $this->getLoanData();
        
        return [
            'datasets' => [
                [
                    'label' => 'Total Pinjaman Buku jangka 1 Tahun',
                    'data' => $data['counts'],
                    'borderColor' => '#FFA500',
                    'tension' => 0.2,
                ],
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    
    private function getLoanData(): array
    {
        $year = Carbon::now()->year;
        $months = collect(range(1, 12))->map(function ($month) use ($year) {
            return Carbon::createFromDate($year, $month, 1);
        });
        
        $monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        
        $monthlyCounts = $months->map(function ($month) {
            return Peminjam::whereYear('tanggal_peminjaman', $month->year)
                ->whereMonth('tanggal_peminjaman', $month->month)
                ->count();
        })->toArray();
        
        return [
            'labels' => $monthLabels,
            'counts' => $monthlyCounts,
        ];
    }
}