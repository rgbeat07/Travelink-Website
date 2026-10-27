<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\souvenirCatalog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<souvenirCatalog>
 */
class SouvenirCatalogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::where('type', 'souvenir')->inRandomOrder()->first()?->id,
            'title' => 'Custom'.fake()->words(2, true),
            'main_photo_url' => 'https://picsum.photos/600/600?random='.rand(101, 200),
            'moq' => fake()->randomElement([12, 24, 50, 100]),
            'description' => fake()->paragraph(2),
            'specification' => "• Bahan: Premium\n• Custom: Emboss Logo\n• Garansi: Kualitas Terjamin",
            'is_featured' => fake()->boolean(30),
        ];
    }
}
