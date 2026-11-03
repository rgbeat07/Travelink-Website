<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => fake()->randomElement(['Domestik', 'Internasional']),
            'title' => 'Gathering & Outing '.fake()->company(),
            'video_url' => fake()->randomElement(['https://www.youtube.com/watch?v=LXb3EKWsInQ', 'https://www.instagram.com/reel/DSsEOCBk6a4/']),
            'thumbnail_url' => 'https://picsum.photos/800/600?random='.rand(1, 100),
            'location' => fake()->city().', Indonesia',
            'pax' => fake()->numberBetween(20, 150),
            'duration' => fake()->numberBetween(2, 4).' Hari '.fake()->numberBetween(1, 3).' Malam',
            'hotel' => 'Hotel '.fake()->lastName(),
            'summary' => fake()->paragraph(3),
            'is_featured' => true,
        ];
    }
}
