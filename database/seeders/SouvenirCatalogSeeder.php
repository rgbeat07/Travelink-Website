<?php

namespace Database\Seeders;

use App\Models\souvenirCatalog;
use Illuminate\Database\Seeder;

class SouvenirCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        'category_id',
        'title',
        'main_photo_url',
        'moq',
        'description',
        'specification',
        */
        $souvenirItem = [

        ];

        souvenirCatalog::factory()->count(6)->create();
    }
}
