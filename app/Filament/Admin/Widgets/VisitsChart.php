<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\Visit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class VisitsChart extends ChartWidget
{
    protected ?string $heading = 'Visits — last 30 days';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $start = Carbon::today()->subDays(29);

        $rows = Visit::query()
            ->where('created_at', '>=', $start)
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->pluck('total', 'day');

        $labels = [];
        $values = [];

        for ($i = 0; $i < 30; $i++) {
            $day = $start->copy()->addDays($i)->toDateString();
            $labels[] = Carbon::parse($day)->format('M j');
            $values[] = (int) ($rows[$day] ?? 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Visits',
                    'data' => $values,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.15)',
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
