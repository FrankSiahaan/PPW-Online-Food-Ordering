<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MenuController::class, 'index']);
Route::get('/home', [MenuController::class, 'index']);
Route::get('/checkout', [MenuController::class, 'checkout']);
Route::post('/keranjang', [MenuController::class, 'keranjang']);
Route::post('/checkout', [MenuController::class, 'submitOrder'])->name('checkout.submit');
