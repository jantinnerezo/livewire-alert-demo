<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\Visit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class VisitsHourlyChart extends ChartWidget
{
    protected ?string $heading = 'Visits — last 24 hours';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $start = Carbon::now()->subHours(23)->startOfHour();

        $rows = Visit::query()
            ->where('created_at', '>=', $start)
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') as bucket, COUNT(*) as total")
            ->groupBy('bucket')
            ->pluck('total', 'bucket');

        $labels = [];
        $values = [];

        for ($i = 0; $i < 24; $i++) {
            $hour = $start->copy()->addHours($i);
            $key = $hour->format('Y-m-d H:00:00');
            $labels[] = $hour->format('H:00');
            $values[] = (int) ($rows[$key] ?? 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Visits',
                    'data' => $values,
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.15)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
