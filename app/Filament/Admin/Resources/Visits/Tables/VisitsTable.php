<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Visits\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VisitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label('When')
                    ->dateTime()
                    ->since()
                    ->sortable(),
                TextColumn::make('path')
                    ->label('Path')
                    ->limit(60)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('referer')
                    ->label('Referer')
                    ->limit(40)
                    ->toggleable()
                    ->placeholder('—'),
                TextColumn::make('user_agent')
                    ->label('User Agent')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('ip_hash')
                    ->label('Visitor')
                    ->formatStateUsing(fn (?string $state) => $state ? substr($state, 0, 8) : '—')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('today')
                    ->label('Today')
                    ->query(fn (Builder $query) => $query->whereDate('created_at', today())),
                Filter::make('last_7_days')
                    ->label('Last 7 days')
                    ->query(fn (Builder $query) => $query->where('created_at', '>=', now()->subDays(7))),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([]);
    }
}
