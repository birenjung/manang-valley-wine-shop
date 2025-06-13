<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    protected $model = \App\Models\OrderDetail::class;

    public function definition()
    {
        // Pick or create a valid order and product
        $order = Order::inRandomOrder()->first() ?? Order::factory()->create();
        $product = Product::inRandomOrder()->first() ?? Product::factory()->create();

        $quantity = $this->faker->numberBetween(1, 5);
        $price = $product->product_price;

        return [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $price,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
