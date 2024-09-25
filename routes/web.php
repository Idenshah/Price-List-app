<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedPriceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/prices', PriceController::class)->middleware(['auth', 'verified']);

Route::get('/trashed', [TrashedPriceController::class, 'index'])->middleware(['auth', 'verified'])->name('trashed.index');
Route::get('/trashed/{price}', [TrashedPriceController::class, 'show'])->withTrashed()->middleware(['auth', 'verified'])->name('trashed.show');
Route::put('/trashed/{price}', [TrashedPriceController::class, 'update'])->withTrashed()->middleware(['auth', 'verified'])->name('trashed.update');
Route::delete('/trashed/{price}', [TrashedPriceController::class, 'destroy'])->withTrashed()->middleware(['auth', 'verified'])->name('trashed.destroy');

require __DIR__.'/auth.php';
