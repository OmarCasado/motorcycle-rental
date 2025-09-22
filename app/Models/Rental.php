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
        'status'
    ];

    protected $casts = [
    'start_datetime' => 'datetime',
    'end_datetime'   => 'datetime',
    ];

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
