<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'beranda'])->name('beranda');
Route::get('/produk', [ProductController::class, 'produk'])->name('produk');
Route::get('/produk/{id}', [ProductController::class, 'detailProduk'])->name('detailProduk');
Route::get('/chat', [ProductController::class, 'chat'])->name('chat');
Route::get('/notif', [ProductController::class, 'notif'])->name('notif');
Route::get('/akun', [ProductController::class, 'akun'])->name('akun');
Route::get('/jual', [ProductController::class, 'jual'])->name('jual');

Route::post('/upload', [ProductController::class, 'store'])->name('product.upload');
Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [ProductController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');

// Route::get('produk/create', [ProductController::class, 'create']);
// Route::post('produk/store', [ProductController::class, 'store'])->name('uploadProduk');

