<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Motorcycle extends Model
{
    protected $fillable = [
        'brand_id',
        'model',
        'year',
        'color',
        'price_per_day',
        'is_available',
        'image_path',
    ];

    // バイクに関連するレビュー
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // バイクのブランド情報
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
