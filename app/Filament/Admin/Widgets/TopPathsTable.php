<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\Visit;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Support\Facades\DB;

class TopPathsTable extends TableWidget
{
    protected static ?string $heading = 'Top pages — last 7 days';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $sub = DB::table('visits')
            ->where('created_at', '>=', now()->subDays(7))
            ->selectRaw('MIN(id) as id, path, COUNT(*) as hits, COUNT(DISTINCT ip_hash) as uniques')
            ->groupBy('path');

        return $table
            ->query(Visit::query()->fromSub($sub, 'visits'))
            ->defaultSort('hits', 'desc')
            ->paginated([10, 25, 50])
            ->columns([
                TextColumn::make('path')->label('Path')->limit(80),
                TextColumn::make('hits')->label('Hits')->numeric()->sortable(),
                TextColumn::make('uniques')->label('Unique')->numeric()->sortable(),
            ]);
    }
}
