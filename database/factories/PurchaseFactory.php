<?php

namespace Database\Factories;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->word,
            'supplier_name' => $this->faker->company,
            'product_quantity' => $this->faker->numberBetween(1, 100),
            'purchase_price' => $this->faker->randomFloat(2, 1, 100),
            'sale_price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}