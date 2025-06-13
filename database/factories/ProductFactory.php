<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->words(3, true),
            'product_price' => $this->faker->randomFloat(2, 5, 1000), // price between 5 and 1000
            'product_quantity' => $this->faker->numberBetween(1, 500),
            'product_description' => $this->faker->paragraphs(3, true),
            'product_sku' => strtoupper(Str::random(8)), // unique SKU
            'product_photo' => json_encode([
                $this->faker->imageUrl(640, 480, 'products', true),
                $this->faker->imageUrl(640, 480, 'products', true)
            ]),
            'product_status' => $this->faker->randomElement(['1', '0']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
