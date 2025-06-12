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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->float('product_price', 8, 2); // Better to define precision and scale
            $table->unsignedMediumInteger('product_quantity')->default(1);
            $table->longText('product_description')->nullable();
            $table->string('product_sku')->unique(); // SKUs should be unique
            // $table->unsignedBigInteger('product_product_category_id');
            $table->json('product_photo')->nullable();
            $table->enum('product_status', ['1' , '0'])->default('1');
            $table->timestamps();

            // Foreign key constraint
            // $table->foreign('product_product_category_id')
            //     ->references('id')
            //     ->on('product_categories')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
