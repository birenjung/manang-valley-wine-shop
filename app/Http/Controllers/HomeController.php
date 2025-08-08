<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function allProducts()
    {
        $products = Product::where('product_status', 1)->latest()->paginate(10);

        return view('frontend.products', compact('products'));
    }
}
