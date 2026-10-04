<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('code')->label('Kode')->searchable(),
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('phone')->label('WhatsApp'),
                TextColumn::make('property.name')->label('Perumahan')->searchable(),
                TextColumn::make('unit_code')->label('Kavling'),
                TextColumn::make('status')->label('Status')->badge()
                    ->color(fn (string $state) => match ($state) {
                        'baru'      => 'warning',
                        'dihubungi' => 'info',
                        'dipesan'   => 'success',
                        'batal'     => 'danger',
                        default     => 'gray',
                    }),
                TextColumn::make('created_at')->label('Masuk')->dateTime('d M Y H:i')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->options([
                    'baru' => 'Baru', 'dihubungi' => 'Dihubungi',
                    'dipesan' => 'Dipesan', 'batal' => 'Batal',
                ]),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}