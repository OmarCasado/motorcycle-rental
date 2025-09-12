<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'motorcycle_id',
        'start_datime',
        'end_datetime',
        'total_price',
    ];
}
