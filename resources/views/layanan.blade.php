<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Layanan - Sistem Informasi Layanan Tatap Muka - DJBC</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --font-size: 16px;
      --background: #ffffff;
      --foreground: oklch(0.145 0 0);
      --card: #ffffff;
      --card-foreground: oklch(0.145 0 0);
      --popover: oklch(1 0 0);
      --popover-foreground: oklch(0.145 0 0);
      --primary: #030213;
      --primary-foreground: oklch(1 0 0);
      --secondary: oklch(0.95 0.0058 264.53);
      --secondary-foreground: #030213;
      --muted: #ececf0;
      --muted-foreground: #717182;
      --accent: #e9ebef;
      --accent-foreground: #030213;
      --destructive: #d4183d;
      --destructive-foreground: #ffffff;
      --border: rgba(0, 0, 0, 0.1);
      --input: transparent;
      --input-background: #f3f3f5;
      --switch-background: #cbced4;
      --font-weight-medium: 500;
      --font-weight-normal: 400;
      --ring: oklch(0.708 0 0);
      --radius: 0.625rem;
    }
    
    html {
      font-size: var(--font-size);
      scroll-behavior: smooth;
    }
    
    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--background);
      color: var(--foreground);
    }
    
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            border: 'var(--border)',
            input: 'var(--input)',
            ring: 'var(--ring)',
            background: 'var(--background)',
            foreground: 'var(--foreground)',
            primary: { /* ... (sama) ... */ },
            secondary: { /* ... (sama) ... */ },
            destructive: { /* ... (sama) ... */ },
            muted: { /* ... (sama) ... */ },
            accent: { /* ... (sama) ... */ },
            popover: { /* ... (sama) ... */ },
            card: {
              DEFAULT: 'var(--card)',
              foreground: 'var(--card-foreground)',
            },
          },
          borderRadius: {
            lg: 'var(--radius)',
            md: 'calc(var(--radius) - 2px)',
            sm: 'calc(var(--radius) - 4px)',
          },
          fontWeight: {
            medium: 'var(--font-weight-medium)',
            normal: 'var(--font-weight-normal)',
          }
        }
      }
    }
  </style>
</head>
<body class="antialiased min-h-screen bg-slate-50 flex flex-col">

  <div class="h-2 bg-gradient-to-r from-[#003d82] via-[#0052a3] to-[#003d82]"></div>
  <div class="h-1 bg-[#d4af37]"></div>
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between h-20">
        <a href="index.html" class="flex items-center gap-3">
          <div class="w-14 h-14 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-lg flex items-center justify-center shadow-lg">
            <i data-lucide="shield" class="w-8 h-8 text-white"></i>
          </div>
          <div>
            <div class="text-[#003d82] font-bold text-lg leading-tight">DJBC</div>
            <div class="text-slate-600 text-xs leading-tight">Direktorat Jenderal Bea dan Cukai</div>
          </div>
        </a>
        <nav class="hidden lg:flex items-center gap-1">
          <a href="index.html" class="px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100">
            Beranda
          </a>
          <a href="index.html#layanan" class="px-4 py-2 rounded-lg transition-colors bg-[#003d82] text-white">
            Layanan Tatap Muka
          </a>
          <a href="index.html#informasi" class="px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100">
            Informasi
          </a>
          <a href="antrian.html" class="px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100">
            Antrian
          </a>
          <a href="kontak.html" class="px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100">
            Kontak
          </a>
        </nav>
        <div class="hidden lg:flex items-center gap-3">
          <a href="#"> <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 border border-[#003d82] text-[#003d82] hover:bg-[#003d82] hover:text-white">
              Portal Admin
            </button>
          </a>
        </div>
        <button id="mobile-menu-btn" class="lg:hidden p-2">
          <i data-lucide="menu" class="w-6 h-6"></i>
          <i data-lucide="x" class="w-6 h-6 hidden"></i>
        </button>
      </div>
      <nav id="mobile-menu" class="lg:hidden pb-4 space-y-2 hidden">
        <a href="index.html" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Beranda
        </a>
        <a href="index.html#layanan" class="block px-4 py-2 rounded-lg bg-[#003d82] text-white">
          Layanan Tatap Muka
        </a>
        <a href="index.html#informasi" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Informasi
        </a>
        <a href="antrian.html" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Antrian
        </a>
        <a href="kontak.html" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Kontak
        </a>
        <a href="#"> <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 border border-[#003d82] text-[#003d82]">
            Portal Admin
          </button>
        </a>
      </nav>
    </div>
  </header>

  <main class="flex-1">
    <div class="bg-slate-50 min-h-screen py-12">
      <div class="container mx-auto px-4">
        
        <div id="breadcrumb-container" class="mb-8">
          <a href="index.html" class="text-slate-600 hover:text-[#003d82]">Beranda</a>
          <span class="mx-2 text-slate-400">/</span>
          <span class="text-slate-800">Informasi Kepabeanan & Cukai</span>
        </div>
        
        <div id="header-container" class="text-center mb-12">
          <h1 class="text-3xl font-bold text-slate-800 mb-4">Informasi Kepabeanan & Cukai</h1>
          <p class="text-lg text-slate-600 max-w-2xl mx-auto">Layanan konsultasi dan informasi umum terkait peraturan kepabeanan dan cukai</p>
        </div>
        
        <div id="main-content-container">
          <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between">
              <div class="flex items-center flex-1">
                <div class="flex flex-col items-center flex-1">
                  <div class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 bg-[#003d82] text-white ring-4 ring-[#003d82]/20">
                    <span>1</span>
                  </div>
                  <span class="mt-2 text-sm text-center transition-colors text-slate-800">
                    Pilih Pengguna
                  </span>
                </div>
                <div class="h-1 flex-1 mx-2 transition-all duration-300 bg-slate-200" style="margin-bottom: 2.5rem;"></div>
              </div>
              
              <div class="flex items-center flex-1">
                <div class="flex flex-col items-center flex-1">
                  <div class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 bg-slate-200 text-slate-400">
                    <span>2</span>
                  </div>
                  <span class="mt-2 text-sm text-center transition-colors text-slate-400">
                    Isi Data & Dokumen
                  </span>
                </div>
                <div class="h-1 flex-1 mx-2 transition-all duration-300 bg-slate-200" style="margin-bottom: 2.5rem;"></div>
              </div>
              
              <div class="flex items-center flex-1">
                <div class="flex flex-col items-center flex-1">
                  <div class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 bg-slate-200 text-slate-400">
                    <span>3</span>
                  </div>
                  <span class="mt-2 text-sm text-center transition-colors text-slate-400">
                    Review
                  </span>
                </div>
                <div class="h-1 flex-1 mx-2 transition-all duration-300 bg-slate-200" style="margin-bottom: 2.5rem;"></div>
              </div>
              
              <div class="flex items-center flex-1">
                <div class="flex flex-col items-center flex-1">
                  <div class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 bg-slate-200 text-slate-400">
                    <span>4</span>
                  </div>
                  <span class="mt-2 text-sm text-center transition-colors text-slate-400">
                    Dapatkan Antrian
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="p-8 max-w-5xl mx-auto mt-12 rounded-lg border bg-card text-card-foreground shadow-sm">
            <div class="text-center mb-8">
              <h2 class="text-xl font-medium text-slate-800 mb-2">Pilih Kategori Pengguna</h2>
              <p class="text-slate-600">Silakan pilih kategori yang sesuai dengan kebutuhan Anda</p>
            </div>

            <div id="user-type-grid" class="grid grid-cols-1 md:grid-cols-2 gap-6">
              
              <a href="/form">
                <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                  
                  <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg mx-auto">
                    <i data-lucide="building-2" class="w-8 h-8 text-white"></i>
                  </div>
                  
                  <h3 class="text-center text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                    Perusahaan
                  </h3>
                  
                  <p class="text-center text-slate-600 text-sm mb-4">
                    Untuk keperluan perusahaan
                  </p>

                  <div class="space-y-2 mb-4">
                    <p class="flex items-start gap-2 text-sm text-slate-600">
                      <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                      ID Card + SKB
                    </p>
                    <p class="flex items-start gap-2 text-sm text-slate-600">
                      <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                      Surat Tugas dari Perusahaan (maks. H-5)
                    </p>
                  </div>
                  
                  <div class="flex items-center justify-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                    <span class="text-sm font-medium">Pilih</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                  </div>
                </div>
              </a>

              <a href="form.html">
                <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                  
                  <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg mx-auto">
                    <i data-lucide="landmark" class="w-8 h-8 text-white"></i>
                  </div>
                  
                  <h3 class="text-center text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                    Pemerintah
                  </h3>
                  
                  <p class="text-center text-slate-600 text-sm mb-4">
                    Instansi pemerintahan
                  </p>

                  <div class="space-y-2 mb-4">
                    <p class="flex items-start gap-2 text-sm text-slate-600">
                      <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                      ID Card Instansi
                    </p>
                    <p class="flex items-start gap-2 text-sm text-slate-600">
                      <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                      Surat Tugas Lembaga
                    </p>
                  </div>
                  
                  <div class="flex items-center justify-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                    <span class="text-sm font-medium">Pilih</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                  </div>
                </div>
              </a>

              <a href="form.html">
                <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                  
                  <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg mx-auto">
                    <i data-lucide="user" class="w-8 h-8 text-white"></i>
                  </div>
                  
                  <h3 class="text-center text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                    Perorangan
                  </h3>
                  
                  <p class="text-center text-slate-600 text-sm mb-4">
                    Perseorangan / individu
                  </p>

                  <div class="space-y-2 mb-4">
                    <p class="flex items-start gap-2 text-sm text-slate-600">
                      <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                      KTP (WNI)
                    </p>
                    <p class="flex items-start gap-2 text-sm text-slate-600">
                      <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                      Paspor / KTP Merah (WNA)
                    </p>
                  </div>
                  
                  <div class="flex items-center justify-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                    <span class="text-sm font-medium">Pilih</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                  </div>
                </div>
              </a>

              <a href="form.html">
                <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                  
                  <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg mx-auto">
                    <i data-lucide="briefcase" class="w-8 h-8 text-white"></i>
                  </div>
                  
                  <h3 class="text-center text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                    Firma Hukum
                  </h3>
                  
                  <p class="text-center text-slate-600 text-sm mb-4">
                    Kantor hukum / advokat
                  </p>

                  <div class="space-y-2 mb-4">
                    <p class="flex items-start gap-2 text-sm text-slate-600">
                      <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                      ID Card + Kartu Advokat
                    </p>
                    <p class="flex items-start gap-2 text-sm text-slate-600">
                      <i data-lucide="check-circle" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                      Surat Kuasa
                    </p>
                  </div>
                  
                  <div class="flex items-center justify-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                    <span class="text-sm font-medium">Pilih</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                  </div>
                </div>
              </a>

            </div> </div>

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
  </main>

  <footer class="bg-gradient-to-br from-[#003d82] to-[#002754] text-white mt-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0c-3.314 0-6 2.686-6 6s2.686 6 6 6 6-2.686 6-6-2.686-6-6-6zm0 54c-3.314 0-6 2.686-6 6s2.686 6 6 6 6-2.686 6-6-2.686-6-6-6zM0 30c0-3.314 2.686-6 6-6s6 2.686 6 6-2.686 6-6 6-6-2.686-6-6zm54 0c0-3.314 2.686-6 6-6s6 2.686 6 6-2.686 6-6 6-6-2.686-6-6z' fill='%23ffffff' fill-rule='evenodd'/%3E%3C/svg%3E&quot;);">
    </div>
    <div class="h-1 bg-[#d4af37]"></div>
    <div class="container mx-auto px-4 py-12 relative z-10">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
          <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center">
              <i data-lucide="shield" class="w-6 h-6 text-[#d4af37]"></i>
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
            <li><a href="layanan.html?serviceId=informasi" class="hover:underline">Informasi Kepabeanan & Cukai</a></li>
            <li><a href="layanan.html?serviceId=klasifikasi" class="hover:underline">Klasifikasi Barang</a></li>
            <li><a href="layanan.html?serviceId=fasilitas" class="hover:underline">Fasilitas Pembebasan</a></li>
            <li><a href="layanan.html?serviceId=pengaduan" class="hover:underline">Pengaduan</a></li>
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
        </div>
      </div>
    </div>
  </footer>
  
  <script>
    // 1. Inisialisasi semua ikon
    lucide.createIcons();

    // 2. Mobile Menu Toggle (Sama seperti index.html)
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = mobileMenuBtn.querySelector('[data-lucide="menu"]');
    const xIcon = mobileMenuBtn.querySelector('[data-lucide="x"]');

    mobileMenuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      menuIcon.classList.toggle('hidden');
      xIcon.classList.toggle('hidden');
    });
    
  </script>
</body>
</html>