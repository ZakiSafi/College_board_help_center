<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/result', [ResultController::class, 'form'])->name('result.form');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/result/create', [ResultController::class, 'create'])->name('result.create');
    Route::post('/result/create', [ResultController::class, 'store'])->name('result.store');
    Route::resource('students', StudentController::class);
});

Route::post('/result/search', [ResultController::class, 'search'],)->name('result.search');
Route::get('/results/{id}/download', [ResultController::class, 'download'])->name('result.download');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
