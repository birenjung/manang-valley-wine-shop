<?php

namespace Database\Factories;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    

public function definition()
{
    // Fetch a random user with role = 2
    $user = User::where('role', 2)->inRandomOrder()->first();

    // Fallback if no such user exists (optional)
    if (!$user) {
        $user = User::factory()->create(['role' => 2]);
    }

    $orderStatuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];
    $paymentStatuses = ['unpaid', 'paid', 'refunded'];
    $paymentMethods = ['credit_card', 'paypal', 'bank_transfer', 'cash_on_delivery'];

    $orderTotal = $this->faker->randomFloat(2, 10, 1000);
    $orderStatus = $this->faker->randomElement($orderStatuses);
    $paymentStatus = $this->faker->randomElement($paymentStatuses);
    $paymentMethod = $paymentStatus === 'unpaid' ? null : $this->faker->randomElement($paymentMethods);
    $orderDate = $this->faker->dateTimeBetween('-1 month', 'now');

    return [
        'user_id' => $user->id,
        'order_user_fullname' => $user->name,
        'order_user_email' => $user->email,
        'order_user_phone' => $user->phone ?? $this->faker->phoneNumber(), // fallback if null
        'delivery_address' => $this->faker->address(),
        'order_total' => $orderTotal,
        'order_status' => $orderStatus,
        'payment_status' => $paymentStatus,
        'payment_method' => $paymentMethod,
        'order_date' => $orderDate,
        'status_change_date' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
}

}
