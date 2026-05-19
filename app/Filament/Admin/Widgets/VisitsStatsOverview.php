<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\Visit;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VisitsStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = Visit::whereDate('created_at', today())->count();
        $week = Visit::where('created_at', '>=', now()->subDays(7))->count();
        $uniqueWeek = Visit::where('created_at', '>=', now()->subDays(7))
            ->distinct('ip_hash')
            ->count('ip_hash');
        $total = Visit::count();

        return [
            Stat::make('Today', number_format($today)),
            Stat::make('Last 7 days', number_format($week)),
            Stat::make('Unique visitors (7d)', number_format($uniqueWeek)),
            Stat::make('All time', number_format($total)),
        ];
    }
}
