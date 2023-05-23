<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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

    protected $model = Product::class;

    public function definition()
    {
        //Generates a new name and stores it in slug with -
        $name = $this->faker->unique()->sentence();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(250),
            'price' => $this->faker->numberBetween(100, 10000),
            'status' => $this->faker->randomElement([1, 2]),
            
            //Get id categories and user random and choose between the ids
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            

        

        ];
    }
}
