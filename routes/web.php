<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('barang', BarangController::class);

Route::resource('pesanan',PesananController::class);



Route::get('/pesanan/order/{id}',  [PesananController::class, 'tambahBarang'])->name('pesanan.tambah');

Route::get('/order/create/{id}',  [OrderController::class, 'create'])->name('order.buat');

//Route::post('/order',[OrderController::class, 'store'])->name('order.store');

//Route::post('order/{id}',[OrderController::class, 'destroy'])->name('order.destroy');

Route::get('/order/cetak/{id}', [OrderController::class, 'cetakpdf'])->name('order.cetak');

Route::resource('order', OrderController::class);