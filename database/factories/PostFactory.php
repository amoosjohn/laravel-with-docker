<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(20),
            'short_description' => fake()->text(50),
            'description' => fake()->text(100),
            'image' => 'https://picsum.photos/800/600?random='.rand(1,1000),
            'status'=> 1
        ];
    }
}
