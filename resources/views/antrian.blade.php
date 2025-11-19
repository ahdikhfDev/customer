@extends('layouts.app')

@section('content')

@php
    // Cek apakah variabel $data ada dan tidak null
    if(isset($data) && $data) {
        // 1. DEFINISIKAN VARIABEL STATUS DI SINI (Ini yang sebelumnya hilang)
        $status = $data->status; 
        
        $ticket = $data->queueTicket; // Relasi ke tiket
        
        $queueNumber = $ticket ? $ticket->queue_number : '---';
        $serviceName = $data->service->name ?? 'Layanan';
        
        // Format Waktu & Tanggal
        $time = $ticket ? \Carbon\Carbon::parse($ticket->estimated_time)->format('H:i') . ' WIB' : '-';
        $date = $ticket ? \Carbon\Carbon::parse($ticket->service_date)->translatedFormat('d F Y') : '-';
    } else {
        // 2. Fallback jika diakses langsung tanpa token (Halaman /antrian biasa)
        $status = 'unknown';
        $serviceName = 'Cek Antrian';
        $queueNumber = '-';
        $time = '-';
        $date = '-';
    }
@endphp

    <div class="bg-slate-50 min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                
                {{-- Header Halaman --}}
                <div class="text-center mb-12 no-print">
                    <h1 class="text-3xl font-bold text-slate-800 mb-4">Status Antrian</h1>
                    <p class="text-lg text-slate-600">
                        @if($status === 'unknown')
                            Silakan masukkan token registrasi Anda.
                        @else
                            Detail pengajuan layanan {{ $serviceName }}.
                        @endif
                    </p>
                </div>

                {{-- TAMPILAN STATUS --}}
                @if($status === 'unknown')
                    {{-- Form Pencarian Token (Jika user masuk tanpa link) --}}
                    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-sm border text-center">
                         <i data-lucide="search" class="w-12 h-12 text-slate-400 mx-auto mb-4"></i>
                         <h3 class="text-lg font-medium text-slate-800 mb-2">Cek Status Pengajuan</h3>
                         <p class="text-sm text-slate-600 mb-4">Masukkan Token Registrasi yang Anda dapatkan saat mendaftar.</p>
                         
                         <form action="{{ route('antrian.status') }}" method="GET" class="flex gap-2">
                             <input type="text" name="token" class="form-input border p-2 rounded w-full" placeholder="Contoh: REG-X8Y2..." required>
                             <button type="submit" class="bg-[#003d82] text-white px-4 py-2 rounded hover:bg-[#002754]">Cek</button>
                         </form>
                    </div>

                @elseif($status === 'pending')
                    {{-- Status Pending --}}
                    <div class="p-8 bg-white border border-yellow-200 rounded-lg shadow-sm text-center max-w-2xl mx-auto">
                        <div class="inline-block p-4 bg-yellow-50 rounded-full mb-4">
                            <i data-lucide="clock" class="w-12 h-12 text-yellow-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-2">Menunggu Verifikasi</h3>
                        <p class="text-slate-600 mb-6">
                            Data pengajuan Anda telah kami terima dan sedang dalam proses verifikasi oleh petugas.
                            Mohon cek halaman ini secara berkala.
                        </p>
                        <div class="bg-slate-50 p-4 rounded-md inline-block text-left">
                            <p class="text-xs text-slate-500 uppercase font-bold tracking-wider mb-1">Token Registrasi</p>
                            <p class="text-xl font-mono font-bold text-[#003d82]">{{ $data->ticket_token }}</p>
                        </div>
                        <div class="mt-6 text-sm text-slate-500">
                            <p>Simpan token ini untuk mengecek status pengajuan Anda.</p>
                        </div>
                    </div>

                @elseif($status === 'approved')
                    {{-- Status Approved (Tiket Muncul) --}}
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-8 mb-8 bg-gradient-to-br from-white to-slate-50 border-2 border-[#d4af37] shadow-xl print-content">
                        <div class="text-center mb-6">
                            <div class="inline-block p-4 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl mb-4">
                                <i data-lucide="ticket" class="w-12 h-12 text-white"></i>
                            </div>
                            <h2 class="text-2xl font-medium text-slate-800 mb-2">{{ $serviceName }}</h2>
                            
                            <div class="text-8xl font-bold text-[#003d82] mb-4">
                                {{ $queueNumber }}
                            </div>
                            
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 border-2 border-green-300 rounded-full">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-600"></i>
                                <span class="text-green-700 font-medium">Antrian Aktif</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="text-center p-4 bg-white rounded-lg border border-slate-200">
                                <i data-lucide="clock" class="w-6 h-6 text-[#003d82] mx-auto mb-2"></i>
                                <p class="text-sm text-slate-600 mb-1">Perkiraan Waktu</p>
                                <p class="text-lg font-medium text-slate-900">{{ $time }}</p>
                            </div>

                            <div class="text-center p-4 bg-white rounded-lg border border-slate-200">
                                <i data-lucide="calendar" class="w-6 h-6 text-[#003d82] mx-auto mb-2"></i>
                                <p class="text-sm text-slate-600 mb-1">Tanggal</p>
                                <p class="text-lg font-medium text-slate-900">{{ $date }}</p>
                            </div>

                            <div class="text-center p-4 bg-white rounded-lg border border-slate-200">
                                <i data-lucide="map-pin" class="w-6 h-6 text-[#003d82] mx-auto mb-2"></i>
                                <p class="text-sm text-slate-600 mb-1">Lokasi</p>
                                <p class="text-lg font-medium text-slate-900">{{ $ticket->location ?? 'Loket Pelayanan' }}</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 no-print">
                            <button id="print-btn" class="flex-1 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 bg-[#003d82] text-white hover:bg-[#002754] transition-colors gap-2">
                                <i data-lucide="printer" class="w-4 h-4"></i>
                                Print Antrian
                            </button>
                        </div>
                    </div>

                    {{-- Informasi Penting --}}
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 bg-blue-50 border-l-4 border-[#003d82] mb-8 no-print">
                        <h3 class="text-lg font-medium text-slate-800 mb-3">Informasi Penting</h3>
                        <ul class="space-y-2 text-sm text-slate-700">
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"></i>
                                <span>Harap datang <strong>15 menit sebelum</strong> perkiraan waktu pelayanan</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"></i>
                                <span>Bawa <strong>dokumen asli</strong> yang telah Anda unggah</span>
                            </li>
                        </ul>
                    </div>

                @elseif($status === 'rejected')
                    {{-- Status Rejected --}}
                    <div class="p-8 bg-white border border-red-200 rounded-lg shadow-sm text-center max-w-2xl mx-auto">
                        <div class="inline-block p-4 bg-red-50 rounded-full mb-4">
                            <i data-lucide="x-circle" class="w-12 h-12 text-red-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-red-700 mb-2">Pengajuan Ditolak</h3>
                        <p class="text-slate-600 mb-6">
                            Mohon maaf, pengajuan Anda belum dapat kami setujui.
                        </p>
                        <div class="bg-red-50 p-4 rounded-md text-left border border-red-100">
                            <p class="text-xs text-red-500 uppercase font-bold tracking-wider mb-1">Alasan Penolakan:</p>
                            <p class="text-slate-800">{{ $data->rejection_note ?? 'Dokumen tidak lengkap atau tidak sesuai.' }}</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('layanan') }}" class="text-[#003d82] hover:underline font-medium">Ajukan Ulang Layanan &rarr;</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const printBtn = document.getElementById('print-btn');
            if(printBtn) {
              printBtn.addEventListener('click', () => {
                window.print();
              });
            }
        </script>
    @endpush

@endsection