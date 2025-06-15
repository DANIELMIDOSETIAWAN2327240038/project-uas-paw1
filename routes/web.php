<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\VarianController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/merk', MerkController::class);
Route::resource('/varian', VarianController::class);
Route::resource('/pelanggan', PelangganController::class);
Route::resource('/kendaraan', KendaraanController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Include authentication routes (assuming auth.php exists)
require __DIR__.'/auth.php';
