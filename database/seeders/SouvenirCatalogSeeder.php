<?php

namespace Database\Seeders;

use App\Models\souvenirCatalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SouvenirCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        souvenirCatalog::factory()->count(6)->create();
    }
}
