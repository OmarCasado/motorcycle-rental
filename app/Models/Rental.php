<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'motorcycle_id',
        'start_datetime',
        'end_datetime',
        'total_price',
    ];

    protected $casts = [
    'start_datetime' => 'datetime',
    'end_datetime'   => 'datetime',
];
}
