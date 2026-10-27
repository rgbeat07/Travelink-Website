<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "category_name" => "Domestik",
            "type" => "portfolio"
        ]);

        Category::create([
            "category_name" => "Internasional",
            "type" => "portfolio"
        ]);

        Category::create([
            "category_name" => "Tumbler",
            "type" => "souvenir"
        ]);

        Category::create([
            "category_name" => "Plakat",
            "type" => "souvenir"
        ]);
    }
}
