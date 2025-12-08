<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'motorcycle_id',
        'rating',
        'comment'
    ];

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }
}
