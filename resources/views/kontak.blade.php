@extends('layouts.app')

{{-- Variabel aktifNav dan withSurveyModal harus disetel di routes/web.php --}}

@section('content')
    <div class="bg-slate-50 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                
                {{-- Header Halaman --}}
                <div class="text-center mb-12">
                    <h1 class="text-3xl font-bold text-slate-800 mb-4">Hubungi Kami</h1>
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                        Kami siap membantu Anda dengan informasi layanan kepabeanan dan cukai
                    </p>
                </div>

                {{-- Contact Cards (Grid 2x2) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                    
                    {{-- Card 1: Alamat --}}
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-xl flex items-center justify-center mb-4">
                            <i data-lucide="map-pin" class="w-6 h-6 text-white"></i>
                        </div>
                        <h3 class="text-xl font-medium text-slate-800 mb-2">Alamat Kantor</h3>
                        <p class="text-slate-600">
                            Direktorat Jenderal Bea dan Cukai<br>
                            Kementerian Keuangan Republik Indonesia<br>
                            Jl. Jenderal A. Yani, Jakarta Pusat<br>
                            DKI Jakarta 10110
                        </p>
                    </div>

                    {{-- Card 2: Telepon --}}
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-xl flex items-center justify-center mb-4">
                            <i data-lucide="phone" class="w-6 h-6 text-white"></i>
                        </div>
                        <h3 class="text-xl font-medium text-slate-800 mb-2">Telepon</h3>
                        <p class="text-slate-600 mb-2">
                            <strong>Layanan Informasi:</strong><br>
                            (021) 4890308
                        </p>
                        <p class="text-slate-600">
                            <strong>Call Center:</strong><br>
                            1500-225 (24 Jam)
                        </p>
                    </div>

                    {{-- Card 3: Email (DILENGKAPI) --}}
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-xl flex items-center justify-center mb-4">
                            <i data-lucide="mail" class="w-6 h-6 text-white"></i>
                        </div>
                        <h3 class="text-xl font-medium text-slate-800 mb-2">Email</h3>
                        <p class="text-slate-600 mb-2">
                            <strong>Informasi Umum:</strong><br>
                            <a href="mailto:info@beacukai.go.id" class="text-[#003d82] hover:underline">
                                info@beacukai.go.id
                            </a>
                        </p>
                        <p class="text-slate-600">
                            <strong>Pengaduan:</strong><br>
                            <a href="mailto:pengaduan@beacukai.go.id" class="text-[#003d82] hover:underline">
                                pengaduan@beacukai.go.id
                            </a>
                        </p>
                    </div>
                    
                    {{-- Card 4: Jam Layanan (DILENGKAPI) --}}
                    <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-xl flex items-center justify-center mb-4">
                            <i data-lucide="clock" class="w-6 h-6 text-white"></i>
                        </div>
                        <h3 class="text-xl font-medium text-slate-800 mb-2">Jam Layanan</h3>
                        <p class="text-slate-600 mb-2">
                            <strong>Senin - Jumat:</strong><br>
                            08.00 - 15.00 WIB
                        </p>
                        <p class="text-slate-600">
                            <strong>Istirahat:</strong><br>
                            12.00 - 13.00 WIB
                        </p>
                    </div>
                </div>

                {{-- Online Services --}}
                <div class="p-8 bg-gradient-to-br from-[#003d82] to-[#0052a3] text-white relative overflow-hidden rounded-lg shadow-lg">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#d4af37] rounded-full -mr-16 -mt-16 opacity-20"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-[#d4af37] rounded-full -ml-12 -mb-12 opacity-20"></div>
                    
                    <div class="relative z-10">
                        <h2 class="text-2xl font-medium text-white mb-6 text-center">Layanan Online</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Website Resmi --}}
                            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl">
                                <i data-lucide="globe" class="w-8 h-8 text-[#d4af37] mb-3"></i>
                                <h3 class="text-xl font-medium text-white mb-2">Website Resmi</h3>
                                <p class="text-slate-100 text-sm mb-3">
                                    Akses informasi lengkap dan layanan online DJBC
                                </p>
                                <a href="https://www.beacukai.go.id" target="_blank" rel="noopener noreferrer" class="text-[#d4af37] hover:underline text-sm font-medium">
                                    www.beacukai.go.id →
                                </a>
                            </div>
                            {{-- Live Chat --}}
                            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl">
                                <i data-lucide="message-square" class="w-8 h-8 text-[#d4af37] mb-3"></i>
                                <h3 class="text-xl font-medium text-white mb-2">Live Chat</h3>
                                <p class="text-slate-100 text-sm mb-3">
                                    Chat dengan customer service kami (Senin-Jumat, 08.00-15.00)
                                </p>
                                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 bg-[#d4af37] hover:bg-[#c4a02e] text-[#003d82] text-sm font-medium">
                                    Mulai Chat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Map Placeholder (DILENGKAPI) --}}
                <div class="mt-8 p-0 overflow-hidden rounded-lg border bg-card text-card-foreground shadow-sm">
                    <div class="bg-slate-200 h-96 flex items-center justify-center">
                        {{-- Placeholder/Iframe Google Maps bisa ditaruh di sini --}}
                        <div class="text-center text-slate-500">
                            <i data-lucide="map-pin" class="w-16 h-16 mx-auto mb-4"></i>
                            <p class="text-lg font-medium">Peta Lokasi Kantor Pusat</p>
                            <p class="text-sm">Jl. Jenderal A. Yani, Jakarta Pusat</p>
                        </div>
                    </div>
                </div>

                {{-- Social Media (DILENGKAPI) --}}
                <div class="mt-8 text-center">
                    <p class="text-slate-600 mb-4">Ikuti kami di media sosial:</p>
                    <div class="flex justify-center gap-4">
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors">Facebook</button>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors">Twitter</button>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors">Instagram</button>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors">YouTube</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection