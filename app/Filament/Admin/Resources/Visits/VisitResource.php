<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Visits;

use App\Filament\Admin\Resources\Visits\Pages\ListVisits;
use App\Filament\Admin\Resources\Visits\Pages\ViewVisit;
use App\Filament\Admin\Resources\Visits\Schemas\VisitInfolist;
use App\Filament\Admin\Resources\Visits\Tables\VisitsTable;
use App\Models\Visit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VisitResource extends Resource
{
    protected static ?string $model = Visit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static ?string $recordTitleAttribute = 'path';

    public static function infolist(Schema $schema): Schema
    {
        return VisitInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisitsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVisits::route('/'),
            'view' => ViewVisit::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
