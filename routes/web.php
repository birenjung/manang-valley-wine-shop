<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);

Route::post('/admin/remove-product-cover-photo', [ProductController::class, 'removeCoverPhoto'])->name('remove.product.cover.photo');

Route::post('/admin/change/product-status', [ProductController::class, 'changeProductStatus'])->name('change.product.status');  

Route::post('/admin/change/order-status', [OrderController::class, 'changeOrderStatus'])->name('orders.updateStatus');

Route::post('/admin/change/payment-status', [OrderController::class, 'changePayStatus'])->name('change.payment.status');



require __DIR__ . '/auth.php';
