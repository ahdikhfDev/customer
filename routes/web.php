<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Beranda
Route::get('/', function () {
    return view('index', [
        'title' => 'Sistem Informasi Layanan Tatap Muka - DJBC',
        'activeNav' => 'beranda',
        'withSurveyModal' => true,
    ]);
})->name('home');

// 2. Halaman Kontak
Route::get('/kontak', function () {
    return view('kontak', [
        'title' => 'Hubungi Kami - DJBC',
        'activeNav' => 'kontak',
        'withSurveyModal' => true,
    ]);
})->name('kontak');

// --- GROUP ROUTES APLIKASI (Menggunakan Controller) ---

// 3. Halaman Pilih Layanan & Kategori
Route::get('/layanan', [ApplicationController::class, 'showServiceSelection'])->name('layanan');

// 4. Halaman Formulir (Isi Data)
Route::get('/form', [ApplicationController::class, 'showForm'])->name('form');

// 5. Proses ke Halaman Review (POST dari Form)
Route::post('/review', [ApplicationController::class, 'processReview'])->name('application.review');

// TAMBAHAN PENTING: Tangani akses langsung (GET) ke halaman review
Route::get('/review', function() {
    // Jika user coba akses /review langsung, kembalikan ke form
    return redirect()->route('form'); 
});

// 6. Proses Submit Akhir (POST dari Review ke Database)
Route::post('/submit-application', [ApplicationController::class, 'store'])->name('application.store');

// 7. Halaman Tiket Antrian (Cek Status)
Route::get('/antrian/status', [ApplicationController::class, 'checkStatus'])->name('antrian.status');

// Halaman Antrian Umum (Landing Page Antrian)
Route::get('/antrian', function () {
    return view('antrian', [
        'title' => 'Cek Antrian - DJBC',
        'activeNav' => 'antrian',
        'printArea' => false, 
        'noPrint' => false,
        'data' => null // Kosong karena belum ada data spesifik
    ]);
})->name('antrian');