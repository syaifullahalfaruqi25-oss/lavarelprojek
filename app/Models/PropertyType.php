<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $fillable = [
        'property_id',
        'name',
        'category',
        'price',
        'building_area',
        'land_area',
        'bedrooms',
        'bathrooms',
        'images',
        'specs',
    ];

    protected $casts = [
        'images' => 'array',
        'specs'  => 'array',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}