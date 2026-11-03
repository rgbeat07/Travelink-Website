<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'yt_vid_id',
        'thumbnail_url',
        'location',
        'pax',
        'duration',
        'hotel',
        'summary',
        'is_featured',
    ];
}
