<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Visits\Pages;

use App\Filament\Admin\Resources\Visits\VisitResource;
use App\Filament\Admin\Widgets\TopPathsTable;
use App\Filament\Admin\Widgets\VisitsChart;
use App\Filament\Admin\Widgets\VisitsHourlyChart;
use App\Filament\Admin\Widgets\VisitsStatsOverview;
use App\Filament\Admin\Widgets\VisitsWeeklyChart;
use Filament\Resources\Pages\ListRecords;

class ListVisits extends ListRecords
{
    protected static string $resource = VisitResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            VisitsStatsOverview::class,
            VisitsChart::class,
            VisitsWeeklyChart::class,
            VisitsHourlyChart::class,
            TopPathsTable::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return 3;
    }
}
