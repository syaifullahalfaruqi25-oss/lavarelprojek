<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'code', 'property_id', 'property_type_id', 'unit_code',
        'name', 'nik', 'phone', 'email', 'address', 'job', 'income',
        'payment_method', 'notes', 'status', 'admin_notes',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
}