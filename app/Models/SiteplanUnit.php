<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteplanUnit extends Model
{
    protected $fillable = ['property_id', 'code', 'category', 'status', 'type_name', 'price'];
}