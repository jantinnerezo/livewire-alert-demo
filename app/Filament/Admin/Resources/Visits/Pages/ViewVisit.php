<?php

namespace App\Filament\Admin\Resources\Visits\Pages;

use App\Filament\Admin\Resources\Visits\VisitResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVisit extends ViewRecord
{
    protected static string $resource = VisitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
