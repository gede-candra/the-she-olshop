<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

// Auth
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Product
    Route::resource('/produk', ProductController::class);

    // Order
    Route::resource('/pesanan', OrderController::class);

    // Customer
    Route::resource('/pelanggan', UserController::class);
});

// Guest
Route::middleware('guest')->group(function () {
    // Authentication
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/lupa-password', [AuthController::class, 'lupaPasword'])->name('lupaPasword');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Homepage
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
// Recommendation
Route::get('/rekomendasi-lainnya', [HomepageController::class, 'showRecommendations'])->name('product-by-category');
// Show Product Category
Route::get('/{slug}', [HomepageController::class, 'showProductsByCategory'])->name('product-by-category');
// Product Detail
Route::get('/{categorySlug}/{slug}', [HomepageController::class, 'showProductDetail'])->name('product-detail');