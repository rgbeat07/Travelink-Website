<?php

namespace Database\Seeders;

use App\Models\portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        'category_id',
        'title',
        'yt_vid_id',
        'thumbnail_url',
        'location',
        'pax',
        'duration',
        'summary',
        'is_featured',
        */
        $portfolioItem = [

        ];

        portfolio::factory()->count(6)->create();
    }
}
