<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PropertyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('developer')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                TextInput::make('id_lokasi'),
                TextInput::make('subsidi_unit')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('komersil_unit')
                    ->required()
                    ->numeric()
                    ->default(0),
                FileUpload::make('image')
    ->label('Gambar Cover')
    ->image()
    ->disk('supabase') // Ganti dengan disk yang sesuai
    ->directory('properties')
    ->visibility('public'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
