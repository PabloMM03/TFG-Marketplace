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

    public function definition()
    {
        //Generate a new name in slug format
        $name = $this->faker->unique()->word(30);

        return [
            'name' => $this->faker->word(30),
            'slug' => Str::slug($name),  
        ];
    }
}
