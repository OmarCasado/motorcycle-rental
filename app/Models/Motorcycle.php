<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    protected $fillable = [
        'brand_id',
        'model',
        'year',
        'color',
        'price_per_day',
        'is_available',
    ];
}
