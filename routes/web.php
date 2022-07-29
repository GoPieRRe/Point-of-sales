<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BarangController, MerekController,PemasokController, PembelianController,PenjualanController};

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
    return view('layouts.main');
});


Route::resource('Barang', BarangController::class);
Route::resource('Merek', MerekController::class);
Route::resource('Pemasok', PemasokController::class);
Route::resource('Pembelian', PembelianController::class);
Route::resource('Penjualan', PenjualanController::class);