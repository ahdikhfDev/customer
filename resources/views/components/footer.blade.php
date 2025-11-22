@props(['noPrint' => false])
<footer class="bg-gradient-to-br from-[#003d82] to-[#002754] text-white mt-20 relative overflow-hidden @if($noPrint) no-print @endif">
<!-- <div class="absolute inset-0 opacity-15" 
     style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='50' height='50' viewBox='0 0 50 50' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23ffffff' stroke-width='1'%3E%3Cpath d='M25 0 L30 20 L50 25 L30 30 L25 50 L20 30 L0 25 L20 20 Z' /%3E%3Cpath d='M25 15 L27 23 L35 25 L27 27 L25 35 L23 27 L15 25 L23 23 Z' stroke-opacity='0.6'/%3E%3Ccircle cx='25' cy='25' r='2' fill='%23ffffff'/%3E%3C/g%3E%3C/svg%3E&quot;);">
</div> -->
<div class="absolute inset-0 opacity-40 mix-blend-overlay pointer-events-none">
     <img src="./image/panjang.jpeg" alt="" class="w-full h-full object-cover grayscale">
</div>
  <div class="h-1 bg-[#d4af37]"></div>
  <div class="container mx-auto px-4 py-12 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div>
        <div class="flex items-center gap-3 mb-4">
          <div class="w-12 h-12  flex items-center justify-center">
             <img src="./image/logo.png" alt="">
          </div>
          <div>
            <div class="font-bold">DJBC</div>
            <div class="text-sm text-slate-300">Layanan Tatap Muka</div>
          </div>
        </div>
        <p class="text-sm text-slate-300">
          Direktorat Jenderal Bea dan Cukai melayani keperluan kepabeanan dan cukai dengan profesional.
        </p>
      </div>
      <div>
        <h3 class="font-bold mb-4">Layanan</h3>
        <ul class="space-y-2 text-sm text-slate-300">
          <li><a href="{{ url('/layanan?serviceId=informasi') }}" class="hover:underline">Informasi Kepabeanan & Cukai</a></li>
          <li><a href="{{ url('/layanan?serviceId=klasifikasi') }}" class="hover:underline">Klasifikasi Barang</a></li>
          <li><a href="{{ url('/layanan?serviceId=fasilitas') }}" class="hover:underline">Fasilitas Pembebasan</a></li>
          <li><a href="{{ url('/layanan?serviceId=pengaduan') }}" class="hover:underline">Pengaduan</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-bold mb-4">Kontak</h3>
        <div class="space-y-2 text-sm text-slate-300">
          <p>Kementerian Keuangan RI</p>
          <p>Jl. Jenderal A. Yani, Jakarta</p>
          <p>Email: info@beacukai.go.id</p>
          <p>Telp: (021) 4890308</p>
          <p class="pt-2 border-t border-white/20 mt-2 text-xs">
            <strong>Lokasi Pelayanan Tatap Muka:</strong><br>
            Gedung Papua, Kantor Pusat DJBC<br>
            Jl. Jenderal Ahmad Yani, Jakarta
          </p>
        </div>
      </div>
    </div>
    <div class="border-t border-white/20 mt-8 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-sm text-slate-300 text-center md:text-left">
          &copy; 2025 Direktorat Jenderal Bea dan Cukai. Kementerian Keuangan Republik Indonesia.
        </p>
        @if(!Request::is('antrian'))
        <button
          id="survey-btn-footer"
          class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-3 gap-2 border border-white/30 text-white hover:bg-white/10"
        >
          <i data-lucide="star" class="w-4 h-4"></i>
          Survey Kepuasan
        </button>
        @endif
      </div>
    </div>
  </div>
</footer>