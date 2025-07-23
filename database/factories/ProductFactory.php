<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
            'https://images.unsplash.com/photo-1517336714731-489689fd1ca8',
            'https://images.unsplash.com/photo-1465101046530-73398c7f28ca',
            'https://images.unsplash.com/photo-1519125323398-675f0ddb6308',
            'https://images.unsplash.com/photo-1503602642458-232111445657',
            'https://images.unsplash.com/photo-1519985176271-adb1088fa94c',
            'https://images.unsplash.com/photo-1512499617640-c2f999098c67',
            'https://images.unsplash.com/photo-1465101178521-c1a9136a3b99',
        ];
        $name = $this->faker->words(3, true);
        $category = Category::inRandomOrder()->first();
        return [
            'name' => ucfirst($name),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->randomFloat(2, 20, 2000),
            'stock' => $this->faker->numberBetween(0, 100),
            'images' => json_encode([Arr::random($images)]),
            'category_id' => $category ? $category->id : 1,
            'brand' => $this->faker->company,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1000, 9999),
            'availability' => $this->faker->randomElement(['available', 'unavailable', 'discontinued']),
        ];
    }
}
