<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Baju baru',
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'stock' => mt_rand(10, 30),
            'price' => mt_rand(50000, 100000),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
