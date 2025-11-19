<?php

use Illuminate\Support\Facades\Route;

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

// 1. Rute Beranda (index.blade.php)
Route::get('/', function () {
    return view('index', [
        'title' => 'Sistem Informasi Layanan Tatap Muka - DJBC',
        'activeNav' => 'beranda', // Untuk mengaktifkan link navigasi
        'withSurveyModal' => true, // Mengaktifkan modal survey di footer
    ]);
})->name('home');

// 2. Rute Layanan (layanan.blade.php) - Pilih Kategori Pengguna
Route::get('/layanan', function () {
    // Ambil parameter serviceId dari URL, default ke 'informasi'
    $serviceId = request('serviceId', 'informasi');
    
    // Logika penentuan Judul (Header) di sini
    $titleMap = [
        'klasifikasi' => 'Pilih Pengguna - Klasifikasi Barang',
        'fasilitas' => 'Pilih Pengguna - Fasilitas Pembebasan',
        'pengaduan' => 'Pilih Pengguna - Pengaduan',
        'informasi' => 'Pilih Pengguna - Informasi Kepabeanan & Cukai',
    ];

    return view('layanan', [
        'title' => $titleMap[$serviceId] ?? 'Pilih Layanan - DJBC',
        'activeNav' => 'layanan',
        // Meneruskan serviceId agar view dapat mengubah tampilan
        'serviceId' => $serviceId, 
    ]);
})->name('layanan');

// 3. Rute Formulir (form.blade.php) - Isi Data & Dokumen
// Asumsi: form ini akan diakses setelah memilih layanan, jadi breadcrumb dan title menyesuaikan.
Route::get('/form', function () {
    return view('form', [
        'title' => 'Isi Data & Dokumen - DJBC',
        'activeNav' => 'layanan', // Tetap aktif di Layanan Tatap Muka
        // Jika perlu data spesifik layanan (misal dari query string), bisa ditambahkan di sini.
    ]);
})->name('form');

// 4. Rute Kontak (kontak.blade.php)
Route::get('/kontak', function () {
    return view('kontak', [
        'title' => 'Hubungi Kami - DJBC',
        'activeNav' => 'kontak',
        'withSurveyModal' => true,
    ]);
})->name('kontak');

// 5. Rute Antrian (antrian.blade.php)
Route::get('/antrian', function () {
    return view('antrian', [
        'title' => 'Antrian Anda - DJBC',
        'activeNav' => 'antrian',
        'withSurveyModal' => true,
        'printArea' => true, // Menyediakan variabel untuk styling print
        'noPrint' => true, // Menyediakan variabel untuk menyembunyikan elemen non-print
    ]);
})->name('antrian');

Route::post('/review', function (Illuminate\Http\Request $request) {
    // Di sini Anda akan memproses data request, memvalidasi, dan meneruskannya ke view.
    // Karena ini simulasi, kita redirect ke halaman review dummy.
    // Dalam produksi, Anda akan menggunakan metode POST dan View Composer.
    
    // Untuk tujuan demo, kita redirect ke GET dengan membawa dummy data.
    return redirect()->route('review', [
        'service' => $request->service_id, 
        'user' => $request->user_type
        // ... kirim data form lainnya sebagai session/parameter aman
    ]);
})->name('review.submit');

Route::get('/review', function () {
    return view('review', [
        'title' => 'Review Pengajuan - DJBC',
        'activeNav' => 'layanan',
    ]);
})->name('review');

// 7. Rute Antrian (Dipanggil setelah konfirmasi review)
Route::get('/antrian', function () {
    return view('antrian', [
        'title' => 'Nomor Antrian Anda - DJBC',
        'activeNav' => 'antrian',
        'withSurveyModal' => true,
        'printArea' => true, 
        'noPrint' => true, 
    ]);
})->name('antrian');