@extends('layouts.app')

@section('content')
    
    @php
        // 1. Mengambil serviceId dari Controller/Route, default ke 'informasi'
        // Variabel $serviceId harus dilewatkan dari Controller/Route
        $serviceId = $serviceId ?? request('serviceId', 'informasi'); 
        
        // 2. Mapping data untuk setiap jenis layanan
        $serviceMap = [
            'klasifikasi' => [
                'title' => 'Klasifikasi Barang', 
                'desc' => 'Layanan penentuan klasifikasi barang impor/ekspor (Khusus Perusahaan)',
                'icon' => 'package'
            ],
            'fasilitas' => [
                'title' => 'Fasilitas Pembebasan', 
                'desc' => 'Permohonan fasilitas pembebasan bea masuk/cukai',
                'icon' => 'gift'
            ],
            'pengaduan' => [
                'title' => 'Pengaduan', 
                'desc' => 'Layanan pengaduan, aspirasi, atau permintaan data spesifik',
                'icon' => 'message-square'
            ],
            'informasi' => [
                'title' => 'Informasi Kepabeanan & Cukai', 
                'desc' => 'Layanan konsultasi dan informasi umum terkait peraturan kepabeanan dan cukai',
                'icon' => 'file-text'
            ],
        ];

        // 3. Menentukan layanan yang sedang aktif dan aturan pembatasan
        $currentService = $serviceMap[$serviceId] ?? $serviceMap['informasi'];

        // ATURAN PEMBATASAN: Klasifikasi dan Fasilitas hanya untuk Perusahaan
        $isCompanyOnly = in_array($serviceId, ['klasifikasi', 'fasilitas']);

        // 4. Mapping data untuk setiap kategori pengguna (user cards)
        $userCategories = [
            'perusahaan' => [
                'name' => 'Perusahaan',
                'icon_lucide' => 'building-2',
                'color_from' => 'from-blue-500',
                'color_to' => 'to-blue-600',
                'description' => 'Untuk keperluan perusahaan',
                'requirements' => ['ID Card + SKB', 'Surat Tugas dari Perusahaan (maks. H-5)'],
            ],
            'pemerintah' => [
                'name' => 'Pemerintah',
                'icon_lucide' => 'landmark',
                'color_from' => 'from-purple-500',
                'color_to' => 'to-purple-600',
                'description' => 'Instansi pemerintahan',
                'requirements' => ['ID Card Instansi', 'Surat Tugas Lembaga'],
            ],
            'perorangan' => [
                'name' => 'Perorangan',
                'icon_lucide' => 'user',
                'color_from' => 'from-green-500',
                'color_to' => 'to-green-600',
                'description' => 'Perseorangan / individu',
                'requirements' => ['KTP (WNI)', 'Paspor / KTP Merah (WNA)'],
            ],
            'firma-hukum' => [
                'name' => 'Firma Hukum',
                'icon_lucide' => 'briefcase',
                'color_from' => 'from-orange-500',
                'color_to' => 'to-orange-600',
                'description' => 'Kantor hukum / advokat',
                'requirements' => ['ID Card + Kartu Advokat', 'Surat Kuasa'],
            ],
        ];
    @endphp

    <div class="bg-slate-50 py-12">
        <div class="container mx-auto px-4">
            
            {{-- 1. Breadcrumb --}}
            <div id="breadcrumb-container" class="mb-8">
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-[#003d82]">Beranda</a>
                <span class="mx-2 text-slate-400">/</span>
                <span class="text-slate-800">{{ $currentService['title'] }}</span>
            </div>
            
            {{-- 2. Header --}}
            <div id="header-container" class="text-center mb-12">
                <h1 class="text-3xl font-bold text-slate-800 mb-4">{{ $currentService['title'] }}</h1>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">{{ $currentService['desc'] }}</p>
            </div>
            
            {{-- 3. Main Content --}}
            <div id="main-content-container">
                
                {{-- STEP INDICATOR (Step 1 Aktif) --}}
                <div class="max-w-4xl mx-auto">
                    <div class="flex items-center justify-between">
                        
                        {{-- Logika Step Indicator --}}
                        @php $stepActive = 1; @endphp
                        @for ($i = 1; $i <= 4; $i++)
                            @php
                                $isCompleted = $i < $stepActive;
                                $isActive = $i == $stepActive;
                                $colorClass = $isCompleted ? 'bg-green-500 text-white' : ($isActive ? 'bg-[#003d82] text-white ring-4 ring-[#003d82]/20' : 'bg-slate-200 text-slate-400');
                                $textColor = $isCompleted || $isActive ? 'text-slate-800' : 'text-slate-400';
                            @endphp

                            <div class="flex items-center flex-1">
                                <div class="flex flex-col items-center flex-1">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 {{ $colorClass }}">
                                        @if ($isCompleted)
                                            <i data-lucide="check" class="w-6 h-6"></i>
                                        @else
                                            <span>{{ $i }}</span>
                                        @endif
                                    </div>
                                    <span class="mt-2 text-sm text-center transition-colors {{ $textColor }}">
                                        {{ ['Pilih Pengguna', 'Isi Data & Dokumen', 'Review', 'Dapatkan Antrian'][$i - 1] }}
                                    </span>
                                </div>
                                @if ($i < 4)
                                    <div class="h-1 flex-1 mx-2 transition-all duration-300 {{ $isCompleted ? 'bg-green-500' : 'bg-slate-200' }}" style="margin-bottom: 2.5rem;"></div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Grid Pemilihan Kategori Pengguna --}}
                <div class="p-8 max-w-5xl mx-auto mt-12 rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="text-center mb-8">
                        <h2 class="text-xl font-medium text-slate-800 mb-2">Pilih Kategori Pengguna</h2>
                        <p class="text-slate-600">Silakan pilih kategori yang sesuai dengan kebutuhan Anda</p>
                    </div>

                    {{-- Kontrol Layout Grid (1 kolom jika Company Only, 2 kolom jika semua) --}}
                    <div id="user-type-grid" class="grid grid-cols-1 {{ $isCompanyOnly ? 'md:grid-cols-1 max-w-md mx-auto' : 'md:grid-cols-2' }} gap-6">
                        
                        {{-- Looping untuk menampilkan kartu pengguna --}}
                        @foreach ($userCategories as $key => $category)
                            
                            {{-- Filter: Jika layanan dibatasi, hanya tampilkan 'perusahaan' --}}
                            @if ($isCompanyOnly && $key !== 'perusahaan')
                                @continue 
                            @endif

                            <a href="{{ route('form') }}?service={{ $serviceId }}&user={{ $key }}"> 
                                <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                                    
                                    <div class="w-16 h-16 bg-gradient-to-br {{ $category['color_from'] }} {{ $category['color_to'] }} rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg mx-auto">
                                        <i data-lucide="{{ $category['icon_lucide'] }}" class="w-8 h-8 text-white"></i>
                                    </div>
                                    
                                    <h3 class="text-center text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                                        {{ $category['name'] }}
                                    </h3>
                                    
                                    <p class="text-center text-slate-600 text-sm mb-4">
                                        {{ $category['description'] }}
                                    </p>

                                    <div class="space-y-2 mb-4">
                                        @foreach ($category['requirements'] as $req)
                                            <p class="flex items-start gap-2 text-sm text-slate-600">
                                                <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                                                {{ $req }}
                                            </p>
                                        @endforeach
                                    </div>
                                    
                                    <div class="flex items-center justify-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                                        <span class="text-sm font-medium">Pilih</span>
                                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        
                    </div>
                    
                    {{-- Pesan Peringatan Jika Layanan Dibatasi --}}
                    @if ($isCompanyOnly)
                        <div class="text-center mt-6 p-4 bg-yellow-50 rounded-lg max-w-md mx-auto">
                            <p class="text-sm text-yellow-700">Layanan **{{ $currentService['title'] }}** hanya tersedia untuk kategori pengguna **Perusahaan**.</p>
                        </div>
                    @endif
                </div>

                {{-- Info Box Catatan Umum --}}
                <div class="max-w-3xl mx-auto mt-8">
                    <div class="p-6 bg-blue-50 border-l-4 border-[#003d82] rounded-lg">
                    <p class="text-slate-700">
                        <strong>Catatan:</strong> Pastikan semua dokumen yang akan diunggah dalam format PDF atau gambar (JPG/PNG) dengan ukuran maksimal 5MB per file.
                    </p>
                    </div>
                </div>
                
            </div> 
        </div>
    </div>
@endsection