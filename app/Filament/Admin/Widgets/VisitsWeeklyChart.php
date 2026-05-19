<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\Visit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class VisitsWeeklyChart extends ChartWidget
{
    protected ?string $heading = 'Visits — last 7 days';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $start = Carbon::today()->subDays(6);

        $rows = Visit::query()
            ->where('created_at', '>=', $start)
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->pluck('total', 'day');

        $labels = [];
        $values = [];

        for ($i = 0; $i < 7; $i++) {
            $day = $start->copy()->addDays($i)->toDateString();
            $labels[] = Carbon::parse($day)->format('D');
            $values[] = (int) ($rows[$day] ?? 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Visits',
                    'data' => $values,
                    'backgroundColor' => '#10b981',
                    'borderColor' => '#10b981',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
