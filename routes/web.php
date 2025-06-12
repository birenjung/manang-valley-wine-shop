<?php

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

Route::post('/admin/remove-product-cover-photo', [ProductController::class, 'removeCoverPhoto'])->name('remove.product.cover.photo');

Route::post('/admin/change/product-status', [ProductController::class, 'changeProductStatus'])->name('change.product.status');

require __DIR__ . '/auth.php';
