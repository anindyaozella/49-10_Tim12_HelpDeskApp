<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeknisiController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TeknisiController::class, 'dashboard'])->name('dashboard');
    Route::get('/teknisi', [TeknisiController::class, 'index'])->name('teknisi');
    Route::post('/teknisi', [TeknisiController::class, 'store'])->name('teknisi.store');
    Route::put('/teknisi/{id}', [TeknisiController::class, 'update'])->name('teknisi.update');
    Route::delete('/teknisi/{id}', [TeknisiController::class, 'destroy'])->name('teknisi.destroy');
    Route::get('/keahlian', [TeknisiController::class, 'skills'])->name('keahlian');
    Route::post('/keahlian', [TeknisiController::class, 'skillStore'])->name('keahlian.store');
    Route::delete('/keahlian/{id}', [TeknisiController::class, 'skillDelete'])->name('keahlian.destroy');
});
