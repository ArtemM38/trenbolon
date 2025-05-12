<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;



Route::get('/', function () {
    return view('index');})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
});

Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

require __DIR__.'/auth.php';

Route::get('/futmanto', function () {
    return view('futmanto');
});
Route::get('/basketlol', function () {
    return view('basketlol');
});
Route::get('/katalog', function () {
    return view('katalog');
});
Route::get('/kepmanto', function () {
    return view('kepmanto');
});
Route::get('/kofhard', function () {
    return view('kofhard');
});

Route::get('/krtyr', function () {
    return view('krtyr');
});
Route::get('/kyrredfox', function () {
    $productId = 1; // Замените на фактический ID товара в вашей БД
    $product = \App\Models\Product::find($productId);
    return view('kyrredfox', ['product' => $product]);
});
Route::get('/krsolomon', function () {
    $productId = 2; // Замените на фактический ID товара в вашей БД
    $product = \App\Models\Product::find($productId);
    return view('krsolomon', ['product' => $product]);
});
Route::get('/lk', function () {
    return view('lk');
});
Route::get('/lk1', function () {
    return view('lk1');
});
Route::get('/map', function () {
    return view('map');
});
Route::get('/shapmanto', function () {
    return view('shapmanto');
});
Route::get('/shhard', function () {
    return view('shhard');
});

Route::get('/shmanto', function () {
    return view('shmanto');
});
Route::get('/shortmanto', function () {
    return view('shortmanto');
});
Route::get('/shpumaM', function () {
    return view('shpumaM');
});
Route::get('/shsolomonJ', function () {
    return view('shsolomonJ');
});
Route::get('/tapufs', function () {
    return view('tapufs');
});
Route::get('/vetbadboy', function () {
    return view('vetbadboy');
});
Route::get('/vetsitka', function () {
    return view('vetsitka');
});
