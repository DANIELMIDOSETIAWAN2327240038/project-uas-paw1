<?php

use App\Http\Controllers\MerkController;
use App\Http\Controllers\VarianController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/merk', MerkController::class);
Route::resource('/varian', VarianController::class);
Route::resource('/pelanggan', PelangganController::class);
Route::resource('/kendaraan', KendaraanController::class);
