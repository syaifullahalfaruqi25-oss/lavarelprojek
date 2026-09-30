<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name', 'developer', 'location', 'id_lokasi',
        'subsidi_unit', 'komersil_unit', 'image', 'description',
    ];

    public function getImageUrlAttribute(): ?string
{
    if (! $this->image) {
        return null;
    }

    // Link penuh
    if (str_starts_with($this->image, 'http')) {
        return $this->image;
    }

    // Gambar lama di public/images
    if (file_exists(public_path('images/' . $this->image))) {
        return asset('images/' . $this->image);
    }

    // Gambar hasil upload admin (storage/app/public)
    return asset('storage/' . $this->image);
}
}