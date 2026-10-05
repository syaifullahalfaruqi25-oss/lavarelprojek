<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
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
                    ->label('Jumlah Unit Menengah')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('premium_unit')
                    ->label('Jumlah Unit Premium')
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

                Section::make('Peta & Kantor Pemasaran')
                    ->schema([
                        TextInput::make('google_maps_url')
                            ->label('Link Google Maps')
                            ->placeholder('https://maps.app.goo.gl/...')
                            ->maxLength(2000)
                            ->dehydrateStateUsing(function ($state) {
                                if (blank($state)) {
                                    return null;
                                }
                                $state = trim($state);
                                return preg_match('/^https?:\/\//i', $state) ? $state : 'https://' . $state;
                            })
                            ->columnSpanFull(),
                        TextInput::make('marketing_phone')->label('Telepon'),
                        TextInput::make('marketing_whatsapp')
                            ->label('No WhatsApp')
                            ->placeholder('628123456789'),
                        TextInput::make('marketing_email')->label('Email')->email(),
                        TextInput::make('marketing_address')->label('Alamat Kantor Pemasaran'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Foto Lokasi')
                    ->schema([
                        Repeater::make('photos')
                            ->relationship()
                            ->label('Foto')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Foto')
                                    ->placeholder('Foto Gerbang / Jalan Utama')
                                    ->required(),
                                FileUpload::make('image')
                                    ->label('File Foto')
                                    ->image()
                                    ->disk('s3')
                                    ->directory('properties')
                                    ->visibility('private')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('Tambah Foto'),
                    ])
                    ->columnSpanFull(),

                Section::make('Tipe Rumah')
                    ->schema([
                        Repeater::make('types')
                            ->relationship()
                            ->label('Tipe')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Tipe')
                                    ->placeholder('Tipe 36')
                                    ->required(),
                                Select::make('category')
                                    ->label('Kategori')
                                    ->options([
                                        'subsidi'  => 'Subsidi',
                                        'komersil' => 'Menengah',
                                        'premium'  => 'Premium',
                                    ])
                                    ->default('subsidi')
                                    ->required(),
                                
                                TextInput::make('building_area')
                                    ->label('Luas Bangunan (m²)')
                                    ->numeric(),
                                TextInput::make('land_area')
                                    ->label('Luas Lahan (m²)')
                                    ->numeric(),
                                TextInput::make('bedrooms')
                                    ->label('Kamar Tidur')
                                    ->numeric(),
                                TextInput::make('bathrooms')
                                    ->label('Kamar Mandi')
                                    ->numeric(),
                                FileUpload::make('images')
                                    ->label('Foto Tipe')
                                    ->image()
                                    ->multiple()
                                    ->disk('s3')
                                    ->directory('properties')
                                    ->visibility('private')
                                    ->columnSpanFull(),
                                Repeater::make('specs')
                                    ->label('Spesifikasi Teknis')
                                    ->schema([
                                        TextInput::make('judul')->placeholder('Atap')->required(),
                                        TextInput::make('isi')->placeholder('Baja ringan')->required(),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->addActionLabel('Tambah Spesifikasi'),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->addActionLabel('Tambah Tipe Rumah'),
                    ])
                    ->columnSpanFull(),
                                    Section::make('Siteplan Digital')
                    ->schema([
                        FileUpload::make('siteplan_image')
                            ->label('File Siteplan (SVG)')
                            //->acceptedFileTypes(['image/svg+xml'])
                            ->disk('s3')
                            ->directory('properties')
                            ->visibility('private')
                            ->columnSpanFull(),
                        Repeater::make('units')
                            ->relationship()
                            ->label('Kavling')
                            ->schema([
                                TextInput::make('code')
                                    ->label('Kode (sama dengan ID di SVG)')
                                    ->placeholder('A1')
                                    ->required(),
                                Select::make('category')
                                    ->label('Jenis')
                                    ->options([
                                        'subsidi'  => 'Subsidi',
                                        'komersil' => 'Menengah',
                                        'premium'  => 'Premium',
                                    ])
                                    ->default('subsidi')
                                    ->required(),
                                Select::make('status')
                                    ->options([
                                        'tersedia'    => 'Kavling Tersedia',
                                        'pembangunan' => 'Pembangunan',
                                        'ready'       => 'Ready Stock',
                                        'dipesan'     => 'Dipesan',
                                        'proses_bank' => 'Proses Bank',
                                        'terjual'     => 'Terjual',
                                    ])
                                    ->default('tersedia')
                                    ->required(),
                                TextInput::make('type_name')->label('Tipe'),
                                
                            ])
                            ->columns(3)
                            ->collapsed()
                            ->addActionLabel('Tambah Kavling'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}