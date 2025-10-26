<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/lat', [LatihanController::class, 'index']);
Route::get('/bio', [BiodataController::class, 'index']);

Route::resource('barang', BarangController::class);
Route::resource('karyawan', KaryawanController::class);

// Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
// Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
// Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
// Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
// Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
// Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');


