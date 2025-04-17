<?php

namespace App\Filament\Widgets;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Petugas;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDasboard extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Anggota', Anggota::count())
                ->description('Total anggota perpustakaan')
                ->descriptionIcon('heroicon-o-users'),
                
            Stat::make('Jumlah Petugas', Petugas::count())
                ->description('Total petugas perpustakaan')
                ->descriptionIcon('heroicon-o-user-group'),
                
            Stat::make('Jumlah Buku', Buku::count())
                ->description('Total koleksi buku')
                ->descriptionIcon('heroicon-o-book-open'),
        ];
    }
}