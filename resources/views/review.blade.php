{{-- resources/views/review.blade.php --}}

@extends('layouts.app')

@section('content')
    {{-- Ambil data dari Controller --}}
    @php
        // Data Teks
        $data = $data ?? [];
        // Data File (Path Sementara)
        $files = $files ?? []; 
        
        // Mapping nama layanan untuk tampilan
        $serviceNames = [
            'klasifikasi' => 'Klasifikasi Barang',
            'fasilitas' => 'Fasilitas Pembebasan',
            'pengaduan' => 'Pengaduan',
            'informasi' => 'Informasi Kepabeanan',
        ];
        $serviceLabel = $serviceNames[$data['service_id'] ?? ''] ?? 'Layanan Lain';
    @endphp

    <div class="bg-slate-50 min-h-screen py-12">
        <div class="container mx-auto px-4">
            {{-- ... (Breadcrumb & Header sama seperti sebelumnya) ... --}}

            <div class="p-8 max-w-3xl mx-auto mt-12 rounded-lg border bg-card text-card-foreground shadow-xl">
                
                <h2 class="text-2xl font-bold text-slate-800 mb-6">Rangkuman Pengajuan</h2>

                {{-- Tampilan Data (Read Only) --}}
                <div class="space-y-6">
                     <div class="p-4 bg-blue-50 border-l-4 border-[#003d82] rounded-md">
                        <p class="text-sm text-slate-700">
                            <strong>Layanan:</strong> {{ $serviceLabel }}<br>
                            <strong>Kategori:</strong> {{ ucfirst($data['user_type'] ?? '-') }}
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 text-sm text-slate-600 border-t pt-4">
                        <div><strong>Nama Lengkap:</strong></div> <div>{{ $data['fullName'] }}</div>
                        <div><strong>Email:</strong></div> <div>{{ $data['email'] }}</div>
                        <div><strong>No. Telepon:</strong></div> <div>{{ $data['phone'] }}</div>
                    </div>

                    <div class="pt-4 border-t">
                        <h3 class="font-medium mb-2">Dokumen:</h3>
                        <ul class="list-disc pl-5 text-sm text-green-600">
                            @foreach($files as $key => $file)
                                <li>{{ $file['original_name'] }} <span class="text-xs text-slate-400">(Siap dikirim)</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- FORM SUBMIT AKHIR (Hidden Inputs) --}}
                <form action="{{ route('application.store') }}" method="POST" class="mt-8 pt-6 border-t flex gap-4">
                    @csrf
                    
                    {{-- 1. Passing Data Teks kembali ke Controller --}}
                    @foreach($data as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach

                    {{-- 2. Passing Data File (Path Sementara) kembali ke Controller --}}
                    @foreach($files as $key => $file)
                        <input type="hidden" name="files[{{ $key }}][path]" value="{{ $file['path'] }}">
                        <input type="hidden" name="files[{{ $key }}][original_name]" value="{{ $file['original_name'] }}">
                    @endforeach

                    {{-- Tombol Aksi --}}
                    <a href="javascript:history.back()" class="px-6 py-2 border rounded-md text-slate-700 hover:bg-slate-100">
                        Koreksi Data
                    </a>
                    
                    <button type="submit" class="flex-1 px-6 py-2 bg-[#003d82] text-white rounded-md hover:bg-[#002754]">
                        Konfirmasi & Kirim
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection