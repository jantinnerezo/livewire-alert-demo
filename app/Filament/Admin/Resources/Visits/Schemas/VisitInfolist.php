<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Visits\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VisitInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')->label('When')->dateTime(),
                TextEntry::make('path')->label('Path'),
                TextEntry::make('referer')->label('Referer')->placeholder('—'),
                TextEntry::make('user_agent')->label('User Agent')->placeholder('—'),
                TextEntry::make('session_id')->label('Session')->placeholder('—'),
                TextEntry::make('ip_hash')->label('IP hash')->placeholder('—'),
                TextEntry::make('country')->label('Country')->placeholder('—'),
            ]);
    }
}
