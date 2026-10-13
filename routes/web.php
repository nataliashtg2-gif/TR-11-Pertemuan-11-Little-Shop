
<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Beranda
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Daftar produk
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// Detail produk
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

// Kategori produk
Route::get('/categories', function () {
    $categories = Category::orderBy('name')->get();

    return view('categories.index', compact('categories'));
})->name('categories.index');

// Jelajahi produk
Route::get('/explore', function () {
    return redirect()->route('products.index');
})->name('products.explore');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
