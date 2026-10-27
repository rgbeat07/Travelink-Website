<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'yt_vid_id',
        'thumbnail_url',
        'location',
        'pax',
        'duration',
        'summary',
        'is_featured',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
