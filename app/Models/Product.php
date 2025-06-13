<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_name',
        'product_quantity',
        'product_price',
        'product_sku',
        'product_description',
        'product_product_category_id',
        'product_photo'
    ];


    protected $casts = [
        'product_photo' => 'array'
    ];
}
