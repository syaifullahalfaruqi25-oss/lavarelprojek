<?php

namespace App\Filament\Resources\Properties\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PropertiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
    ->label('Gambar')
    ->state(fn ($record) => $record->image_url),
                TextColumn::make('name')
                    ->label('Nama Perumahan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('developer')
                    ->label('Developer')
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),
                TextColumn::make('subsidi_unit')
                    ->label('Unit Subsidi')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('komersil_unit')
                    ->label('Unit Komersil')
                    ->numeric()
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}