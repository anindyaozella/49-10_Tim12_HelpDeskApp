<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IssueCategoryController;
use App\Models\IssueCategory;
use Illuminate\Support\Facades\Route;

// ---------- Hanya untuk tamu (belum login) ----------
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// // ---------- Hanya untuk yang sudah login ----------
// Route::middleware('auth')->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//     Route::get('/', function () {
//         return redirect()->route('categories.index');
//     });

//     // 7 route CRUD kategori masalah IT
//     Route::resource('categories', IssueCategoryController::class);
// });

// ---------- Hanya untuk yang sudah login ----------
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return redirect()->route('categories.index');
    });

    // Admin only: tambah, ubah, hapus.
    // Harus didaftarkan SEBELUM index/show supaya /categories/create
    // tidak tertangkap oleh /categories/{category}
    Route::middleware('admin')->group(function () {
        Route::resource('categories', IssueCategoryController::class)
            ->except(['index', 'show']);
    });

    // Admin + viewer: hanya melihat
    Route::resource('categories', IssueCategoryController::class)
        ->only(['index', 'show']);
});

// // ---------- Publik (form untuk pelapor) ----------
// Route::get('/pengaduan', function () {
//     return view('complaint-preview', [
//         'categories' => IssueCategory::orderBy('type')->orderBy('name')->get()->groupBy('type'),
//         'priorities' => IssueCategory::PRIORITIES,
//     ]);
// })->name('complaint.preview');

// ---------- Publik (form untuk pelapor) ----------
Route::get('/pengaduan', function () {
    return view('complaint-preview', [
        'categories' => IssueCategory::orderBy('type')->orderBy('name')->get()->groupBy('type'),
        'priorities' => IssueCategory::PRIORITIES,
    ]);
})->name('complaint.preview');

// Route::middleware('auth')->group(function () {
//     // Semua user login (admin + viewer) bisa melihat
//     Route::get('/tickets', [TicketController::class, 'index']);
//     Route::get('/tickets/{ticket}', [TicketController::class, 'show']);

//     // Hanya admin yang bisa tambah/ubah/hapus
//     Route::middleware('admin')->group(function () {
//         Route::get('/tickets/create', [TicketController::class, 'create']);
//         Route::post('/tickets', [TicketController::class, 'store']);
//         Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit']);
//         Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
//         Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy']);
//     });
// });