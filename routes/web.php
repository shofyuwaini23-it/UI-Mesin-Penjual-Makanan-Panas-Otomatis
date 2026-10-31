<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('standby');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/checkout/{id}', [ProductController::class, 'checkout'])
    ->name('checkout.show');

Route::get('/payment/processing/{id}', [
    ProductController::class,
    'processing'
    ])->name('payment.processing');

Route::get('/orders/status/{id}', [ProductController::class, 'status'])
    ->name('orders.status');

Route::get('/orders/finished/{id}', [ProductController::class, 'finished'])
    ->name('orders.finished');

Route::get('/standby', function () {
    return view('products.standby');
})->name('standby');