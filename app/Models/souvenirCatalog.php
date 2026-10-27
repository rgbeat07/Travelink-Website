<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class souvenirCatalog extends Model
{
    use HasFactory;
    protected $fillable = [
        "category_id",
        "title",
        "main_photo_url",
        "moq",
        "description",
        "specification",
        "is_featured",
    ];
}
