@extends('layouts.app')

@section('content')

    @php
        // Data Dummy Antrian (Anda harus menggantinya dengan data hasil penyimpanan di database)
        $queueData = [
            'number' => 'A-102',
            'time' => '10:30 WIB',
            'location' => 'Loket Informasi',
            'date' => now()->translatedFormat('d F Y'), // Menggunakan Carbon/Locale Indonesia
            'status' => 'Aktif',
            'service' => 'Fasilitas Pembebasan',
        ];
    @endphp

    <div class="bg-slate-50 min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                
                {{-- Header Halaman (no-print: Sembunyikan saat mencetak) --}}
                <div class="text-center mb-12 no-print">
                    <h1 class="text-3xl font-bold text-slate-800 mb-4">Nomor Antrian Anda</h1>
                    <p class="text-lg text-slate-600">Terima kasih telah mengajukan layanan {{ $queueData['service'] }}</p>
                </div>

                {{-- TIKET ANTRIAN --}}
                {{-- print-content: Area yang akan dicetak --}}
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-8 mb-8 bg-gradient-to-br from-white to-slate-50 border-2 border-[#d4af37] shadow-xl print-content">
                    <div class="text-center mb-6">
                        <div class="inline-block p-4 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl mb-4">
                            <i data-lucide="ticket" class="w-12 h-12 text-white"></i>
                        </div>
                        <h2 class="text-2xl font-medium text-slate-800 mb-2">{{ $queueData['service'] }}</h2>
                        
                        <div class="text-8xl font-bold text-[#003d82] mb-4">
                            {{ $queueData['number'] }}
                        </div>
                        
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 border-2 border-green-300 rounded-full">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600"></i>
                            <span class="text-green-700 font-medium">Antrian {{ $queueData['status'] }}</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="text-center p-4 bg-white rounded-lg border border-slate-200">
                            <i data-lucide="clock" class="w-6 h-6 text-[#003d82] mx-auto mb-2"></i>
                            <p class="text-sm text-slate-600 mb-1">Perkiraan Waktu</p>
                            <p class="text-lg font-medium text-slate-900">{{ $queueData['time'] }}</p>
                        </div>

                        <div class="text-center p-4 bg-white rounded-lg border border-slate-200">
                            <i data-lucide="calendar" class="w-6 h-6 text-[#003d82] mx-auto mb-2"></i>
                            <p class="text-sm text-slate-600 mb-1">Tanggal</p>
                            <p class="text-lg font-medium text-slate-900">{{ $queueData['date'] }}</p>
                        </div>

                        <div class="text-center p-4 bg-white rounded-lg border border-slate-200">
                            <i data-lucide="map-pin" class="w-6 h-6 text-[#003d82] mx-auto mb-2"></i>
                            <p class="text-sm text-slate-600 mb-1">Lokasi</p>
                            <p class="text-lg font-medium text-slate-900">{{ $queueData['location'] }}</p>
                        </div>
                    </div>

                    {{-- Actions (no-print) --}}
                    <div class="flex flex-col sm:flex-row gap-3 no-print">
                        <button id="print-btn" class="flex-1 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 bg-[#003d82] text-white hover:bg-[#002754] transition-colors gap-2">
                            <i data-lucide="printer" class="w-4 h-4"></i>
                            Print Antrian
                        </button>
                        <a href="#" class="flex-1 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors gap-2">
                            <i data-lucide="download" class="w-4 h-4"></i>
                            Download PDF
                        </a>
                    </div>
                </div>

                {{-- Informasi Penting --}}
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 bg-blue-50 border-l-4 border-[#003d82] mb-8 no-print">
                    <h3 class="text-lg font-medium text-slate-800 mb-3">Informasi Penting</h3>
                    <ul class="space-y-2 text-sm text-slate-700">
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"></i>
                            <span>Harap datang **15 menit sebelum** perkiraan waktu pelayanan</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"></i>
                            <span>Bawa **dokumen asli** yang telah Anda unggah</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"></i>
                            <span>Tunjukkan nomor antrian ini kepada petugas</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"></i>
                            <span>Antrian hangus jika tidak hadir dalam **30 menit** setelah dipanggil</span>
                        </li>
                    </ul>
                </div>
                
                {{-- Survey Button, Service Hours, dan Contact Information (Semua no-print) --}}
                {{-- ... (lanjutkan elemen no-print yang ada di HTML asli Anda) ... --}}
                
            </div>
        </div>
    </div>
    
    {{-- Script Khusus Halaman Antrian --}}
    @push('scripts')
        <script>
            // Fungsi Print
            const printBtn = document.getElementById('print-btn');
            if(printBtn) {
              printBtn.addEventListener('click', () => {
                window.print();
              });
            }
        </script>
    @endpush
@endsection