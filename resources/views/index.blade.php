@extends('layouts.app')

{{-- Variabel Title dan Navigasi sudah disetel di routes/web.php --}}

@section('content')
    <section class="relative bg-gradient-to-br from-[#003d82] via-[#0052a3] to-[#003d82] text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z' fill='%23ffffff' fill-opacity='1' fill-rule='evenodd'/%3E%3C/svg%3E&quot;);">
        </div>
        
        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block px-4 py-2 bg-[#d4af37] rounded-full text-sm mb-6 text-slate-900">
                    Kementerian Keuangan Republik Indonesia
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Sistem Informasi Layanan Tatap Muka
                </h1>
                
                <p class="text-xl text-slate-100 mb-8 max-w-2xl mx-auto">
                    Layanan tatap muka terkait kepabeanan dan cukai untuk Perusahaan, Pemerintah, Perorangan, dan Firma Hukum
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#layanan">
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-11 px-8 gap-2 bg-[#d4af37] hover:bg-[#c4a02e] text-[#003d82]">
                            Ajukan Layanan
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </button>
                    </a>
                    <a href="#informasi">
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-11 px-8 bg-white/10 border border-white text-white hover:bg-white/20">
                            Pelajari Lebih Lanjut
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#f8fafc"/>
            </svg>
        </div>
    </section>

    <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i data-lucide="clock" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-medium text-slate-800 mb-2">Pelayanan Cepat</h3>
                    <p class="text-slate-600">Proses pengajuan dan validasi dokumen yang efisien</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i data-lucide="shield" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-medium text-slate-800 mb-2">Aman & Terpercaya</h3>
                    <p class="text-slate-600">Data Anda dijamin keamanannya sesuai standar pemerintah</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i data-lucide="users" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-medium text-slate-800 mb-2">Layanan Profesional</h3>
                    <p class="text-slate-600">Didukung oleh pegawai DJBC yang berpengalaman</p>
                </div>
                
            </div>
        </div>
    </section>

    <section id="layanan" class="py-20 bg-white scroll-mt-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Layanan Tatap Muka DJBC</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                    Pilih layanan yang sesuai dengan kebutuhan Anda. Setiap layanan memiliki persyaratan dokumen yang berbeda berdasarkan kategori pengguna.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                
                <a href="{{ route('layanan') }}?serviceId=informasi"> 
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                            <i data-lucide="file-text" class="w-7 h-7 text-white"></i>
                        </div>
                        
                        <h3 class="text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                            Informasi Kepabeanan & Cukai
                        </h3>
                        
                        <p class="text-slate-600 mb-4">
                            Konsultasi umum terkait peraturan kepabeanan dan cukai
                        </p>
                        
                        <div class="flex items-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                            <span class="text-sm font-medium">Ajukan Sekarang</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </a>
                
                {{-- Service Card 2: Klasifikasi Barang --}}
                <a href="{{ route('layanan') }}?serviceId=klasifikasi">
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                            <i data-lucide="package" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                            Klasifikasi Barang
                        </h3>
                        <p class="text-slate-600 mb-4">
                            Layanan klasifikasi barang impor/ekspor (Khusus Perusahaan)
                        </p>
                        <div class="flex items-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                            <span class="text-sm font-medium">Ajukan Sekarang</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </a>
                
               <a href="{{ route('layanan') }}?serviceId=fasilitas"> {{-- <-- PERUBAHAN DI SINI --}}
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                            <i data-lucide="gift" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                            Fasilitas Pembebasan
                        </h3>
                        <p class="text-slate-600 mb-4">
                            Permohonan fasilitas pembebasan bea masuk (Khusus Perusahaan)
                        </p>
                        <div class="flex items-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                            <span class="text-sm font-medium">Ajukan Sekarang</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('layanan') }}?serviceId=pengaduan">
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                            <i data-lucide="message-square" class="w-7 h-7 text-white"></i>
                        </div>
                        <h3 class="text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                            Pengaduan
                        </h3>
                        <p class="text-slate-600 mb-4">
                            Layanan pengaduan dan aspirasi masyarakat
                        </p>
                        <div class="flex items-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                            <span class="text-sm font-medium">Ajukan Sekarang</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
    </section>

    <section id="informasi" class="py-20 bg-slate-50 scroll-mt-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-800 mb-4">Informasi Layanan</h2>
                    <p class="text-lg text-slate-600">
                        Ketentuan dan prosedur layanan tatap muka DJBC
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm border-l-4 border-[#003d82]">
                        <h3 class="text-xl font-medium text-slate-800 mb-3">Jam Pelayanan</h3>
                        <div class="space-y-2 text-slate-600">
                            <p class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                                Senin - Jumat: 08.00 - 15.00 WIB
                            </p>
                            <p class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                                Istirahat: 12.00 - 13.00 WIB
                            </p>
                        </div>
                    </div>

                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm border-l-4 border-[#d4af37]">
                        <h3 class="text-xl font-medium text-slate-800 mb-3">Persyaratan Umum</h3>
                        <div class="space-y-2 text-slate-600">
                            <p class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                                Dokumen identitas yang masih berlaku
                            </p>
                            <p class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                                Dokumen pendukung sesuai jenis layanan
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-gradient-to-br from-[#003d82] to-[#0052a3] text-white mt-6 relative overflow-hidden rounded-lg shadow-sm">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#d4af37] rounded-full -mr-16 -mt-16 opacity-20"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-[#d4af37] rounded-full -ml-12 -mb-12 opacity-20"></div>
                    
                    <div class="relative z-10">
                        <h3 class="text-xl font-medium text-white mb-3">Alur Pengajuan Layanan</h3>
                        <ol class="space-y-3 text-slate-100">
                            <li class="flex items-start gap-3">
                                <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">1</span>
                                <span>Pilih jenis layanan yang dibutuhkan</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">2</span>
                                <span>Pilih kategori pengguna (Perusahaan/Pemerintah/Perorangan/Firma Hukum)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">3</span>
                                <span>Isi formulir dan unggah dokumen persyaratan</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">4</span>
                                <span>Menunggu validasi dari petugas admin (via email)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">5</span>
                                <span>Dapatkan nomor antrian dan datang sesuai jadwal</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection