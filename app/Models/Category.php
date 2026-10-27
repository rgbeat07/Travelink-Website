<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'type',
    ];

    public function portfolios()
    {
        return $this->hasMany(portfolio::class, 'category_id');
    }

    public function souvenirCatalogs()
    {
        return $this->hasMany(souvenirCatalog::class, 'category_id');
    }
}
