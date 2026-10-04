<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('code')->label('Kode Pesanan')->disabled(),
            Select::make('status')->label('Status')->options([
                'baru'      => 'Baru',
                'dihubungi' => 'Dihubungi',
                'dipesan'   => 'Dipesan',
                'batal'     => 'Batal',
            ])->required(),
            TextInput::make('name')->label('Nama')->disabled(),
            TextInput::make('nik')->label('NIK')->disabled(),
            TextInput::make('phone')->label('WhatsApp')->disabled(),
            TextInput::make('email')->label('Email')->disabled(),
            TextInput::make('job')->label('Pekerjaan')->disabled(),
            TextInput::make('income')->label('Penghasilan')->prefix('Rp')->disabled(),
            TextInput::make('unit_code')->label('Kavling')->disabled(),
            Select::make('payment_method')->label('Pembayaran')->options([
                'kpr_subsidi'   => 'KPR Subsidi',
                'kpr_komersial' => 'KPR Komersial',
                'tunai'         => 'Tunai',
            ])->disabled(),
            Textarea::make('address')->label('Alamat')->disabled()->columnSpanFull(),
            Textarea::make('notes')->label('Catatan Pembeli')->disabled()->columnSpanFull(),
            Textarea::make('admin_notes')->label('Catatan Admin')->columnSpanFull(),
        ]);
    }
}