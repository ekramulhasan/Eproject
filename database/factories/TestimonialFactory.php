<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {
        $name = fake()->name();
        return [

            'client_name' => $name,
            'client_slug' => Str::slug($name),
            'client_designation' => fake()->jobTitle().','.' '.fake()->company(),
            'client_msg' => fake()->paragraph()
        ];
    }
}
