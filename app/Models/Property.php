<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name', 'developer', 'location', 'id_lokasi',
        'subsidi_unit', 'komersil_unit', 'premium_unit',
        'image', 'description',
        'google_maps_url',
        'marketing_address',
        'marketing_phone',
        'marketing_email',
        'marketing_whatsapp',
        'siteplan_image',
    ];

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }

    public function types()
    {
        return $this->hasMany(PropertyType::class);
    }

    public function units()
    {
        return $this->hasMany(SiteplanUnit::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        $base = 'https://ywkzuvaspmyagqhgsyxp.supabase.co/storage/v1/object/public/properties/';

        return $base . str_replace('properties/', '', ltrim($this->image, '/'));
    }
}