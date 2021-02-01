<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryContorller;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum'])->get('/', [DasboardController::class, 'index'])->name('dashboard');

Route::get('product/{id}/gallery', [ProductController::class, 'gallery'])->name('product.gallery');

Route::resource('/product', ProductController::class);
Route::resource('/product-galleries', ProductGalleryContorller::class);
Route::resource('/transaction', TransactionController::class);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
