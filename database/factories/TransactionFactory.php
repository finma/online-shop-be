<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => mt_rand(1, 5),
            'payment_id' => mt_rand(1, 2),
            'customer_id' => mt_rand(1, 2),
            'total_item' => mt_rand(1, 5),
            'total_price' => mt_rand(50000, 200000),
        ];
    }
}
