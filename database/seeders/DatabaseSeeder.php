<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categoryNames = [
            'Smartphones', 'Laptops', 'Headphones', 'Wearables', 'Cameras', 'Accessories', 'Gaming', 'Tablets', 'Audio', 'Smart Home'
        ];
        $categories = collect();
        foreach ($categoryNames as $name) {
            $categories->push(Category::create([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
            ]));
        }

        Product::factory(30)->create();
    }
}
