<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Guest;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class GuestsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    
    protected function getData(): array
    {
        $data = Trend::model(Guest::class)
            ->between(
                start: now()->subYear(),
                end: now(),
            )
            ->perMonth()
            ->count();
    
        return [
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
