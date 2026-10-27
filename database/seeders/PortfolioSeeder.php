<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        portfolio::factory()->count(6)->create();
    }
}
