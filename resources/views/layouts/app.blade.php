<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Sistem Informasi Layanan Tatap Muka - DJBC' }}</title>
  
  {{-- Memuat Tailwind/CSS Anda (sesuaikan dengan cara Anda mengkompilasi) --}}
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- <script src="https://unpkg.com/lucide@latest"></script> akan dipindahkan ke body/end of head --}}

  {{-- Font Inter --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  {{-- Style Kustom dari HTML Asli --}}
  @include('components.styles')
  
</head>
<body class="antialiased min-h-screen bg-slate-50 flex flex-col">

  {{-- Header --}}
  <header class="bg-white shadow-md sticky top-0 z-50 @if(isset($noPrint) && $noPrint) no-print @endif">
    <div class="h-2 bg-gradient-to-r from-[#003d82] via-[#0052a3] to-[#003d82]"></div>
    <div class="h-1 bg-[#d4af37]"></div>
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between h-20">
        <x-ui.header-logo />
        
        {{-- Navigasi Desktop --}}
        <x-ui.desktop-nav :active="$activeNav ?? 'beranda'" />

        <div class="hidden lg:flex items-center gap-3">
          <a href="#">
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 border border-[#003d82] text-[#003d82] hover:bg-[#003d82] hover:text-white">
              Portal Admin
            </button>
          </a>
        </div>
        
        {{-- Tombol Menu Mobile --}}
        <button id="mobile-menu-btn" class="lg:hidden p-2">
          <i data-lucide="menu" class="w-6 h-6"></i>
          <i data-lucide="x" class="w-6 h-6 hidden"></i>
        </button>
      </div>
      
      {{-- Navigasi Mobile --}}
      <x-ui.mobile-nav :active="$activeNav ?? 'beranda'" />
    </div>
  </header>

  {{-- Konten Utama Halaman --}}
  <main class="flex-1 @if(isset($printArea) && $printArea) print-area @endif">
    @yield('content')
  </main>

  {{-- Footer --}}
  <x-footer />

  {{-- Modal Survey (jika digunakan) --}}
  @if(isset($withSurveyModal) && $withSurveyModal)
    <x-survey-modal />
  @endif
  
  {{-- Inisialisasi Lucide & Skrip Dasar --}}
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = mobileMenuBtn ? mobileMenuBtn.querySelector('[data-lucide="menu"]') : null;
    const xIcon = mobileMenuBtn ? mobileMenuBtn.querySelector('[data-lucide="x"]') : null;

    if (mobileMenuBtn) {
      mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        xIcon.classList.toggle('hidden');
      });
    }
  </script>
  
  @stack('scripts')
</body>
</html>