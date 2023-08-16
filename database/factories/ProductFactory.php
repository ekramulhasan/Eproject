<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $title = fake()->sentence(2);
        return [

            'category_id' => category::select('id')->get()->random()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'price' => fake()->numberBetween(100,10000),
            'short_description' => fake()->paragraph(3),
            'long_description' => fake()->paragraph(6),
            'product_id' => fake()->numberBetween(100,10000),
            'product_stock' => fake()->numberBetween(5,100),
            'alert_quantiry' => fake()->numberBetween(1,10),
            'additional_info' => fake()->paragraph(2),
            'product_img' => 'defaul_img.jpg',
            'product_rating' => fake()->numberBetween(1,5)

        ];
    }
}
