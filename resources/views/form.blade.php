@extends('layouts.app')

@section('content')
    
    @php
        // 1. Ambil kedua parameter dari URL
        $serviceId = request('service', 'informasi'); // Contoh: 'fasilitas'
        $userType = request('user', 'unknown');      // Contoh: 'perusahaan'
        
        // 2. Mapping Nama Layanan (Service Map)
        $serviceTitles = [
            'klasifikasi' => 'Klasifikasi Barang',
            'fasilitas' => 'Fasilitas Pembebasan',
            'pengaduan' => 'Layanan Pengaduan',
            'informasi' => 'Informasi Kepabeanan & Cukai',
        ];

        // 3. Mapping Nama Kategori Pengguna (User Map)
        $userNames = [
            'perusahaan' => 'Perusahaan',
            'pemerintah' => 'Pemerintah',
            'perorangan' => 'Perorangan',
            'firma-hukum' => 'Firma Hukum',
        ];

        // 4. Tentukan HEADER UTAMA
        $serviceTitle = $serviceTitles[$serviceId] ?? 'Formulir Pengajuan';
        $userName = $userNames[$userType] ?? '';

        // Kombinasikan Judul: "Fasilitas Pembebasan - Perusahaan"
        $headerText = $serviceTitle . ' - Kategori: ' . $userName;


        // 5. Definisikan Dokumen Persyaratan berdasarkan userType (Logika dokumen tetap sama dan sudah benar)
        $userData = [
            'perusahaan' => [
                'dokumen' => [
                    ['label' => 'ID Card', 'required' => true, 'id' => 'file_idCard'],
                    ['label' => 'SKB (Surat Keterangan Bekerja)', 'required' => true, 'id' => 'file_skb'],
                    ['label' => 'Surat Tugas dari Perusahaan (maks. H-5)', 'required' => true, 'id' => 'file_suratTugas'],
                    ['label' => 'Surat Kuasa (jika konsultasi perusahaan lain)', 'required' => false, 'id' => 'file_suratKuasa'],
                ]
            ],
            'pemerintah' => [
                'dokumen' => [
                    ['label' => 'ID Card Instansi', 'required' => true, 'id' => 'file_idCardInstansi'],
                    ['label' => 'Surat Tugas Lembaga', 'required' => true, 'id' => 'file_suratTugasLembaga'],
                ]
            ],
            'perorangan' => [
                'dokumen' => [
                    ['label' => 'KTP (WNI) / Paspor atau KTP Merah (WNA)', 'required' => true, 'id' => 'file_ktpPaspor'],
                ]
            ],
            'firma-hukum' => [
                'dokumen' => [
                    ['label' => 'ID Card', 'required' => true, 'id' => 'file_idCardFirma'],
                    ['label' => 'Kartu Advokat', 'required' => true, 'id' => 'file_kartuAdvokat'],
                    ['label' => 'Surat Kuasa', 'required' => true, 'id' => 'file_suratKuasaFirma'],
                ]
            ],
            'unknown' => ['dokumen' => []]
        ];

        $currentData = $userData[$userType] ?? $userData['unknown'];
    @endphp

    <div class="bg-slate-50 min-h-screen py-12">
        <div class="container mx-auto px-4">
            
            {{-- Breadcrumb (Diperbarui agar dinamis) --}}
            <div id="breadcrumb-container" class="mb-8">
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-[#003d82]">Beranda</a>
                <span class="mx-2 text-slate-400">/</span>
                <a href="{{ route('layanan') }}?serviceId={{ $serviceId }}" class="text-slate-600 hover:text-[#003d82]">{{ $serviceTitle }}</a>
                <span class="mx-2 text-slate-400">/</span>
                <span class="text-slate-800">Formulir</span>
            </div>
            
            {{-- Header Utama --}}
            <div id="header-container" class="text-center mb-12">
                <h1 class="text-3xl font-bold text-slate-800 mb-2">{{ $serviceTitle }}</h1>
                <p class="text-lg text-slate-600">Kategori: {{ $userName }}</p>
            </div>

            {{-- Main Content --}}
            <div id="main-content-container">
                
                {{-- STEP INDICATOR (Step 2 Aktif) --}}
                <div class="max-w-4xl mx-auto">
                    <div class="flex items-center justify-between">
                        
                        @php $stepActive = 2; @endphp
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

                {{-- KARTU FORMULIR --}}
                <div class="p-8 max-w-3xl mx-auto mt-12 rounded-lg border bg-card text-card-foreground shadow-sm">
                    
                    @if ($userType == 'unknown')
                        <div class="text-center p-8 bg-red-50 border border-red-200 rounded-md">
                            <i data-lucide="alert-triangle" class="w-10 h-10 text-red-500 mx-auto mb-4"></i>
                            <p class="text-xl font-medium text-red-700 mb-2">Akses Ditolak</p>
                            <p class="text-slate-600">Terjadi kesalahan. Anda harus memilih kategori pengguna terlebih dahulu.</p>
                            <a href="{{ route('layanan') }}" class="mt-4 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 bg-[#003d82] text-white hover:bg-[#002754]">
                                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                                Kembali ke Layanan
                            </a>
                        </div>
                    @else
                        
                        <div class="mb-6">
                            <h2 class="text-xl font-medium text-slate-800 mb-2">Formulir Pengajuan</h2>
                            <p class="text-slate-600">Lengkapi data dan unggah dokumen persyaratan</p>
                        </div>

                        <form action="/review" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <input type="hidden" name="user_type" value="{{ $userType }}">
                            <input type="hidden" name="service_id" value="{{ $serviceId }}"> {{-- Tambahkan service ID ke form --}}

                            {{-- Data Pribadi --}}
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-slate-800">Data Diri</h3>
                                
                                <div>
                                    <label for="fullName" class="form-label">Nama Lengkap <span class="required-star">*</span></label>
                                    <input type="text" id="fullName" name="fullName" class="form-input" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="email" class="form-label">Email <span class="required-star">*</span></label>
                                        <input type="email" id="email" name="email" class="form-input" placeholder="email@contoh.com" required>
                                    </div>

                                    <div>
                                        <label for="phone" class="form-label">Nomor Telepon <span class="required-star">*</span></label>
                                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="08xxxxxxxxxx" required>
                                    </div>
                                </div>

                                <div>
                                    <label for="question" class="form-label">Keperluan / Pertanyaan <span class="required-star">*</span></label>
                                    <textarea id="question" name="question" class="form-textarea" placeholder="Jelaskan keperluan atau pertanyaan Anda secara detail" rows="5" required></textarea>
                                </div>
                            </div>

                            {{-- Dokumen Persyaratan (DI GENERATE DARI $currentData) --}}
                            <div class="space-y-4 pt-6 border-t">
                                <h3 class="text-lg font-medium text-slate-800">Dokumen Persyaratan</h3>
                                
                                @foreach ($currentData['dokumen'] as $doc)
                                    <div>
                                        <label class="form-label">
                                            {{ $doc['label'] }} 
                                            @if ($doc['required']) <span class="required-star">*</span> @endif
                                        </label>
                                        <label for="{{ $doc['id'] }}" class="file-upload-area flex flex-col items-center justify-center">
                                            <i data-lucide="upload-cloud"></i>
                                            <span class="text-sm text-slate-600">Klik untuk upload atau drag & drop</span>
                                            <span class="text-xs text-slate-400 mt-1">PDF, JPG, PNG (Maks. 1MB)</span>
                                        </label>
                                        <input 
                                            type="file" 
                                            id="{{ $doc['id'] }}" 
                                            name="{{ $doc['id'] }}" 
                                            class="hidden-file-input" 
                                            @if ($doc['required']) required @endif
                                        >
                                        <span class="file-name-preview" id="{{ $doc['id'] }}_preview"></span>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Info Box --}}
                            <div class="p-4 bg-amber-50 border-l-4 border-amber-500 rounded-md">
                                <div class="flex gap-3">
                                <div class="text-2xl pt-1">⚠️</div>
                                <div class="text-sm text-slate-700">
                                    <p class="mb-2"><strong>Catatan:</strong></p>
                                    <ul class="list-disc list-outside pl-4 space-y-1 text-slate-600">
                                    <li>Maksimal ukuran file dokumen adalah <strong>1 MB</strong></li>
                                    <li>Mohon melampirkan dokumen sesuai jenis pengguna jasa yang dipilih</li>
                                    <li><strong>Jika dokumen tidak sesuai, maka pendaftaran pengunjung akan ditolak</strong></li>
                                    <li>Format yang diterima: PDF, JPG, PNG</li>
                                    <li>Pastikan dokumen terlihat jelas dan tidak blur</li>
                                    <li>Untuk Surat Tugas Perusahaan: maksimal H-5 sebelum kedatangan</li>
                                    </ul>
                                </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="flex gap-4 pt-6 border-t">
                                <a href="{{ route('layanan') }}?serviceId={{ $serviceId }}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors gap-2">
                                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                                    Kembali
                                </a>
                                
                                <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 bg-[#003d82] text-white hover:bg-[#002754] transition-colors flex-1 gap-2">
                                    Review & Kirim
                                    <i data-lucide="send" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div> 
        </div>
    </div>

    {{-- Script untuk Preview Nama File --}}
    @push('scripts')
        <script>
            document.querySelectorAll('.hidden-file-input').forEach(input => {
                input.addEventListener('change', (event) => {
                    const file = event.target.files[0];
                    const label = event.target.closest('div').querySelector('.file-upload-area');
                    
                    if (file) {
                        const previewEl = document.getElementById(event.target.id + '_preview');
                        if (previewEl) {
                            previewEl.textContent = file.name;
                        }
                        // Tambahkan indikator visual berhasil upload
                        if (label) {
                            label.style.borderColor = '#10B981'; // border-green-500
                            label.style.backgroundColor = '#ECFDF5'; // bg-green-50
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection