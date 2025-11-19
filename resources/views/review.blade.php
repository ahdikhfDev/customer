@extends('layouts.app')

@section('content')

    {{-- Data Dummy untuk Review (Anda harus menggantinya dengan data POST dari controller) --}}
    @php
        $serviceId = request('service', 'fasilitas'); 
        $userType = request('user', 'perusahaan');

        // Simulasi data yang diterima dari Form (contoh)
        $formData = [
            'service_title' => 'Fasilitas Pembebasan',
            'user_name' => 'Perusahaan',
            'fullName' => 'PT. ABC Jaya Makmur',
            'email' => 'contact@abcjaya.co.id',
            'phone' => '0211234567',
            'question' => 'Permohonan pembebasan bea masuk untuk impor mesin baru sesuai PMK No. 120/PMK.04/2019.',
            'dokumen' => [
                'file_idCard' => 'ID_Card_Budi.pdf',
                'file_skb' => 'SKB_2025.pdf',
                'file_suratTugas' => 'SuratTugas_001.pdf',
                'file_suratKuasa' => 'Tidak Ada',
            ]
        ];

        // Mapping step indicator
        $serviceTitle = $formData['service_title'] ?? 'Layanan';
        $userName = $formData['user_name'] ?? 'Pengguna';
    @endphp

    <div class="bg-slate-50 min-h-screen py-12">
        <div class="container mx-auto px-4">
            
            {{-- 1. Breadcrumb --}}
            <div id="breadcrumb-container" class="mb-8">
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-[#003d82]">Beranda</a>
                <span class="mx-2 text-slate-400">/</span>
                <a href="{{ route('layanan') }}?serviceId={{ $serviceId }}" class="text-slate-600 hover:text-[#003d82]">{{ $serviceTitle }}</a>
                <span class="mx-2 text-slate-400">/</span>
                <span class="text-slate-800">Review</span>
            </div>
            
            {{-- 2. Header --}}
            <div id="header-container" class="text-center mb-12">
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Review Pengajuan</h1>
                <p class="text-lg text-slate-600">Periksa kembali data Anda sebelum dikirim</p>
            </div>

            {{-- 3. Main Content --}}
            <div id="main-content-container">
                
                {{-- STEP INDICATOR (Step 3 Aktif) --}}
                <div class="max-w-4xl mx-auto">
                    <div class="flex items-center justify-between">
                        
                        @php $stepActive = 3; @endphp
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

                {{-- KARTU REVIEW DATA --}}
                <div class="p-8 max-w-3xl mx-auto mt-12 rounded-lg border bg-card text-card-foreground shadow-xl">
                    <h2 class="text-2xl font-bold text-slate-800 mb-6">Rangkuman Pengajuan</h2>
                    
                    <div class="space-y-6">
                        
                        {{-- Ringkasan Layanan --}}
                        <div class="p-4 bg-blue-50 border-l-4 border-[#003d82] rounded-md">
                            <p class="text-sm text-slate-700">
                                **Layanan:** <span class="font-medium">{{ $formData['service_title'] }}</span><br>
                                **Kategori:** <span class="font-medium">{{ $formData['user_name'] }}</span>
                            </p>
                        </div>

                        {{-- Data Diri --}}
                        <div class="space-y-3 pt-4 border-t">
                            <h3 class="text-lg font-medium text-slate-800">Data Diri Pemohon</h3>
                            <div class="grid grid-cols-2 gap-4 text-sm text-slate-600">
                                <div>**Nama Lengkap:**</div>
                                <div>{{ $formData['fullName'] }}</div>
                                
                                <div>**Email:**</div>
                                <div>{{ $formData['email'] }}</div>
                                
                                <div>**Nomor Telepon:**</div>
                                <div>{{ $formData['phone'] }}</div>
                            </div>
                        </div>

                        {{-- Keperluan --}}
                        <div class="space-y-3 pt-4 border-t">
                            <h3 class="text-lg font-medium text-slate-800">Keperluan / Pertanyaan</h3>
                            <div class="p-3 bg-slate-50 border rounded-md text-sm text-slate-700 whitespace-pre-wrap">
                                {{ $formData['question'] }}
                            </div>
                        </div>

                        {{-- Dokumen --}}
                        <div class="space-y-3 pt-4 border-t">
                            <h3 class="text-lg font-medium text-slate-800">Dokumen Dilampirkan</h3>
                            <ul class="space-y-2 text-sm text-slate-600">
                                @foreach ($formData['dokumen'] as $label => $fileName)
                                    <li class="flex justify-between border-b border-slate-100 pb-1">
                                        <span class="font-medium text-slate-700">{{ str_replace(['file_', '_'], ['',' '], $label) }}</span>
                                        <span class="text-right {{ $fileName === 'Tidak Ada' ? 'text-slate-400' : 'text-green-600 font-medium' }}">
                                            {{ $fileName }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Actions --}}
                    {{-- Form ini hanya untuk konfirmasi, action menuju halaman antrian --}}
                    <form action="{{ route('antrian') }}" method="GET" class="flex gap-4 pt-6 border-t mt-6">
                        <a href="#" onclick="window.history.back(); return false;" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors gap-2">
                            <i data-lucide="pencil" class="w-4 h-4"></i>
                            Koreksi Data
                        </a>
                        
                        <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 bg-[#003d82] text-white hover:bg-[#002754] transition-colors flex-1 gap-2">
                            Konfirmasi & Ambil Antrian
                            <i data-lucide="check-circle" class="w-4 h-4"></i>
                        </button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
@endsection