<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('order_user_fullname')->nullable();
            $table->string('order_user_email')->nullable();
            $table->string('order_user_phone')->nullable();
            $table->text('delivery_address')->nullable(); // delivery address here only
            $table->decimal('order_total', 10, 2)->default(0.00);
            $table->enum('order_status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamp('order_date')->useCurrent();
            $table->timestamp('status_change_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
