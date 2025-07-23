<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement([
            'Smartphones', 'Laptops', 'Headphones', 'Wearables', 'Cameras', 'Accessories', 'Gaming', 'Tablets', 'Audio', 'Smart Home'
        ]);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
