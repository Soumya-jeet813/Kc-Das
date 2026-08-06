<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// Public Routes
Route::get('/', function () { return view('index'); });
Route::get('/checkout', function () {
    $cart = session()->get('cart', []);
    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return view('checkout', compact('cart', 'total'));
})->name('checkout');

// Guest Only (Login/Register)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated Only
Route::middleware('auth')->group(function () {
    Route::get('/account', function () { return view('account'); })->name('account');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

use App\Http\Controllers\ProductController;
Route::get('/shop', [ProductController::class, 'index'])->name('shop');

Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::post('/order/place', [App\Http\Controllers\OrderController::class, 'store'])->name('order.place');
Route::get('/order-success/{id}', [App\Http\Controllers\OrderController::class, 'success'])->name('order.success');