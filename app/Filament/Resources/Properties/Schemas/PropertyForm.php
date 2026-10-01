<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PropertyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Perumahan')
                    ->required(),
                TextInput::make('developer')
                    ->label('Developer (PT)')
                    ->required(),
                TextInput::make('location')
                    ->label('Alamat / Lokasi')
                    ->required(),
                TextInput::make('id_lokasi')
                    ->label('ID Lokasi'),
                TextInput::make('subsidi_unit')
                    ->label('Jumlah Unit Subsidi')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('komersil_unit')
                    ->label('Jumlah Unit Komersil')
                    ->required()
                    ->numeric()
                    ->default(0),
                FileUpload::make('image')
                    ->label('Gambar Cover')
                    ->image()
                    ->disk('s3')
                    ->directory('properties')
                    ->visibility('private'),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
            ]);
    }
}