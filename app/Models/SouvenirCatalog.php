<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SouvenirCatalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'main_photo_url',
        'moq',
        'description',
        'specification',
    ];
}
