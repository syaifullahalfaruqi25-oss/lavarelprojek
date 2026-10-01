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
    // Jika sudah berupa link lengkap (http...)
    if (str_starts_with($this->image, 'http')) {
        return $this->image;
    }
    
    // Jika tersimpan di cloud Supabase, buat URL publiknya
    // Format endpoint public Supabase Storage: https://[project-id].supabase.co/storage/v1/object/public/[bucket-name]/[path]
    $supabaseUrl = 'https://ywkzuvaspmyagqhgsyxp.supabase.co/storage/v1/object/public/properties/';
    
    // Tangani jika path di database sudah ada awalan 'properties/' atau belum
    $path = ltrim($this->image, '/');
    if (!str_starts_with($path, 'properties/')) {
        $path = 'properties/' . $path;
    }

    return 'https://ywkzuvaspmyagqhgsyxp.supabase.co/storage/v1/object/public/properties/' . str_replace('properties/', '', $this->image);
}
}