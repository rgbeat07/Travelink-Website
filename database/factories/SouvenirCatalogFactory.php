<?php

namespace Database\Factories;

use App\Models\SouvenirCatalog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SouvenirCatalog>
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
            'category' => fake()->randomElement(['Tumbler', 'Plakat']),
            'title' => 'Custom'.fake()->words(2, true),
            'main_photo_url' => 'https://picsum.photos/600/600?random='.rand(101, 200),
            'moq' => 10,
            'description' => fake()->paragraph(2),
            'specification' => "• Bahan: Premium\n• Custom: Emboss Logo\n• Garansi: Kualitas Terjamin",
        ];
    }
}
