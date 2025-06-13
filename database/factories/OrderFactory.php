<?php

namespace Database\Factories;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    public function definition()
    {
        // Possible order statuses and payment statuses from your schema enums
        $orderStatuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];
        $paymentStatuses = ['unpaid', 'paid', 'refunded'];
        $paymentMethods = ['credit_card', 'paypal', 'bank_transfer', 'cash_on_delivery'];

        // Faker user info
        $fullname = $this->faker->name();
        $email = $this->faker->unique()->safeEmail();
        $phone = $this->faker->phoneNumber();

        // Delivery address as multiline string
        $deliveryAddress = $this->faker->address();

        // Order total - random decimal between 10 and 1000
        $orderTotal = $this->faker->randomFloat(2, 10, 1000);

        // Random order status and payment status from enums
        $orderStatus = $this->faker->randomElement($orderStatuses);
        $paymentStatus = $this->faker->randomElement($paymentStatuses);

        // Random payment method or null if unpaid
        $paymentMethod = $paymentStatus === 'unpaid' ? null : $this->faker->randomElement($paymentMethods);

        // Random order date within past 1 month
        $orderDate = $this->faker->dateTimeBetween('-1 month', 'now');

        // Delivered at date - only if order_status is delivered
        // $deliveredAt = $orderStatus === 'delivered' ? $this->faker->dateTimeBetween($orderDate, 'now') : null;

        return [
            'user_id' => null, // or you can assign a user ID if you have users factory
            'order_user_fullname' => $fullname,
            'order_user_email' => $email,
            'order_user_phone' => $phone,
            'delivery_address' => $deliveryAddress,
            'order_total' => $orderTotal,
            'order_status' => $orderStatus,
            'payment_status' => $paymentStatus,
            'payment_method' => $paymentMethod,
            'order_date' => $orderDate,
            // 'delivered_at' => $deliveredAt,
            'status_change_date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
