<?php

namespace Database\Seeders;

use App\Models\SouvenirCatalog;
use Illuminate\Database\Seeder;

class SouvenirCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SouvenirCatalog::factory()->count(6)->create();
    }
}
