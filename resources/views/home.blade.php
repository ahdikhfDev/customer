<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi Layanan Tatap Muka - DJBC</title>
  
  <!-- 1. Memuat Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- 2. Memuat Lucide Icons CDN -->
  <script src="https://unpkg.com/lucide@latest"></script>
  
  <!-- 3. Memuat Font Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- 4. Menerapkan Variabel Tema Kustom Anda -->
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
      --chart-1: oklch(0.646 0.222 41.116);
      --chart-2: oklch(0.6 0.118 184.704);
      --chart-3: oklch(0.398 0.07 227.392);
      --chart-4: oklch(0.828 0.189 84.429);
      --chart-5: oklch(0.769 0.188 70.08);
      --radius: 0.625rem;
      --sidebar: oklch(0.985 0 0);
      --sidebar-foreground: oklch(0.145 0 0);
      --sidebar-primary: #030213;
      --sidebar-primary-foreground: oklch(0.985 0 0);
      --sidebar-accent: oklch(0.97 0 0);
      --sidebar-accent-foreground: oklch(0.205 0 0);
      --sidebar-border: oklch(0.922 0 0);
      --sidebar-ring: oklch(0.708 0 0);
    }

    .dark {
      --background: oklch(0.145 0 0);
      --foreground: oklch(0.985 0 0);
      --card: oklch(0.145 0 0);
      --card-foreground: oklch(0.985 0 0);
      --popover: oklch(0.145 0 0);
      --popover-foreground: oklch(0.985 0 0);
      --primary: oklch(0.985 0 0);
      --primary-foreground: oklch(0.205 0 0);
      --secondary: oklch(0.269 0 0);
      --secondary-foreground: oklch(0.985 0 0);
      --muted: oklch(0.269 0 0);
      --muted-foreground: oklch(0.708 0 0);
      --accent: oklch(0.269 0 0);
      --accent-foreground: oklch(0.985 0 0);
      --destructive: oklch(0.396 0.141 25.723);
      --destructive-foreground: oklch(0.637 0.237 25.331);
      --border: oklch(0.269 0 0);
      --input: oklch(0.269 0 0);
      --ring: oklch(0.439 0 0);
      --font-weight-medium: 500;
      --font-weight-normal: 400;
      --chart-1: oklch(0.488 0.243 264.376);
      --chart-2: oklch(0.696 0.17 162.48);
      --chart-3: oklch(0.769 0.188 70.08);
      --chart-4: oklch(0.627 0.265 303.9);
      --chart-5: oklch(0.645 0.246 16.439);
      --sidebar: oklch(0.205 0 0);
      --sidebar-foreground: oklch(0.985 0 0);
      --sidebar-primary: oklch(0.488 0.243 264.376);
      --sidebar-primary-foreground: oklch(0.985 0 0);
      --sidebar-accent: oklch(0.269 0 0);
      --sidebar-accent-foreground: oklch(0.985 0 0);
      --sidebar-border: oklch(0.269 0 0);
      --sidebar-ring: oklch(0.439 0 0);
    }
    
    /* Menerapkan font dasar dan warna dari variabel */
    html {
      font-size: var(--font-size);
      scroll-behavior: smooth;
    }
    
    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--background);
      color: var(--foreground);
    }
    
    /* Konfigurasi Tailwind untuk menggunakan variabel CSS Anda */
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            border: 'var(--border)',
            input: 'var(--input)',
            ring: 'var(--ring)',
            background: 'var(--background)',
            foreground: 'var(--foreground)',
            primary: {
              DEFAULT: 'var(--primary)',
              foreground: 'var(--primary-foreground)',
            },
            secondary: {
              DEFAULT: 'var(--secondary)',
              foreground: 'var(--secondary-foreground)',
            },
            destructive: {
              DEFAULT: 'var(--destructive)',
              foreground: 'var(--destructive-foreground)',
            },
            muted: {
              DEFAULT: 'var(--muted)',
              foreground: 'var(--muted-foreground)',
            },
            accent: {
              DEFAULT: 'var(--accent)',
              foreground: 'var(--accent-foreground)',
            },
            popover: {
              DEFAULT: 'var(--popover)',
              foreground: 'var(--popover-foreground)',
            },
            card: {
              DEFAULT: 'var(--card)',
              foreground: 'var(--card-foreground)',
            },
            sidebar: {
              DEFAULT: 'var(--sidebar)',
              foreground: 'var(--sidebar-foreground)',
              primary: 'var(--sidebar-primary)',
              'primary-foreground': 'var(--sidebar-primary-foreground)',
              accent: 'var(--sidebar-accent)',
              'accent-foreground': 'var(--sidebar-accent-foreground)',
              border: 'var(--sidebar-border)',
              ring: 'var(--sidebar-ring)',
            }
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

    /* Style untuk Survey Dialog */
    .survey-dialog {
      display: none; /* Sembunyikan secara default */
      position: fixed;
      z-index: 100;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
      align-items: center;
      justify-content: center;
    }
    .survey-content {
      background-color: #fff;
      margin: auto;
      padding: 24px;
      border-radius: 0.75rem;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      position: relative;
    }
    .survey-close-btn {
      position: absolute;
      top: 16px;
      right: 16px;
      cursor: pointer;
      color: #9ca3af;
    }
    .survey-stars {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin: 20px 0;
    }
    .survey-stars i {
      width: 36px;
      height: 36px;
      color: #e0e0e0;
      cursor: pointer;
      transition: color 0.2s;
    }
    .survey-stars i:hover,
    .survey-stars i.selected {
      color: #f59e0b; /* amber-500 */
    }
  </style>
</head>
<body class="antialiased min-h-screen bg-slate-50 flex flex-col">

  <!-- Batik Pattern Header -->
  <div class="h-2 bg-gradient-to-r from-[#003d82] via-[#0052a3] to-[#003d82]"></div>
  <div class="h-1 bg-[#d4af37]"></div>
  
  <!-- Header -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between h-20">
        <!-- Logo -->
        <a href="index.html" class="flex items-center gap-3">
          <div class="w-14 h-14 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-lg flex items-center justify-center shadow-lg">
            <i data-lucide="shield" class="w-8 h-8 text-white"></i>
          </div>
          <div>
            <div class="text-[#003d82] font-bold text-lg leading-tight">DJBC</div>
            <div class="text-slate-600 text-xs leading-tight">Direktorat Jenderal Bea dan Cukai</div>
          </div>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-1">
          <a href="index.html" class="px-4 py-2 rounded-lg transition-colors bg-[#003d82] text-white">
            Beranda
          </a>
          <a href="/layanan" class="px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100">
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

        <!-- Admin Link -->
        <div class="hidden lg:flex items-center gap-3">
          <a href="#"> <!-- Tautkan ke halaman admin Anda jika ada -->
            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 border border-[#003d82] text-[#003d82] hover:bg-[#003d82] hover:text-white">
              Portal Admin
            </button>
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="lg:hidden p-2">
          <i data-lucide="menu" class="w-6 h-6"></i>
          <i data-lucide="x" class="w-6 h-6 hidden"></i>
        </button>
      </div>

      <!-- Mobile Navigation -->
      <nav id="mobile-menu" class="lg:hidden pb-4 space-y-2 hidden">
        <a href="index.html" class="block px-4 py-2 rounded-lg bg-[#003d82] text-white">
          Beranda
        </a>
        <a href="index.html#layanan" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
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
        <a href="#"> <!-- Tautkan ke halaman admin Anda -->
          <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 border border-[#003d82] text-[#003d82]">
            Portal Admin
          </button>
        </a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-1">
    <!-- Ini adalah konten dari HomePage.jsx yang telah dikonversi -->
    <div>
      <!-- Hero Section -->
      <section class="relative bg-gradient-to-br from-[#003d82] via-[#0052a3] to-[#003d82] text-white overflow-hidden">
        <!-- Batik Pattern Overlay -->
        <div class="absolute inset-0 opacity-10" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z' fill='%23ffffff' fill-opacity='1' fill-rule='evenodd'/%3E%3C/svg%3E&quot;);">
        </div>
        
        <div class="container mx-auto px-4 py-20 relative z-10">
          <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block px-4 py-2 bg-[#d4af37] rounded-full text-sm mb-6 text-slate-900">
              Kementerian Keuangan Republik Indonesia
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
              Sistem Informasi Layanan Tatap Muka
            </h1>
            
            <p class="text-xl text-slate-100 mb-8 max-w-2xl mx-auto">
              Layanan tatap muka terkait kepabeanan dan cukai untuk Perusahaan, Pemerintah, Perorangan, dan Firma Hukum
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
              <a href="#layanan">
                <!-- <Button> diganti menjadi <button> atau <a> -->
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-11 px-8 gap-2 bg-[#d4af37] hover:bg-[#c4a02e] text-[#003d82]">
                  Ajukan Layanan
                  <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </button>
              </a>
              <a href="#informasi">
                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-11 px-8 bg-white/10 border border-white text-white hover:bg-white/20">
                  Pelajari Lebih Lanjut
                </button>
              </a>
            </div>
          </div>
        </div>
  
        <!-- Decorative Wave -->
        <div class="absolute bottom-0 left-0 right-0">
          <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#f8fafc"/>
          </svg>
        </div>
      </section>
  
      <!-- Features Section -->
      <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="text-center">
              <div class="w-16 h-16 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i data-lucide="clock" class="w-8 h-8 text-white"></i>
              </div>
              <h3 class="text-xl font-medium text-slate-800 mb-2">Pelayanan Cepat</h3>
              <p class="text-slate-600">Proses pengajuan dan validasi dokumen yang efisien</p>
            </div>
            
            <div class="text-center">
              <div class="w-16 h-16 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i data-lucide="shield" class="w-8 h-8 text-white"></i>
              </div>
              <h3 class="text-xl font-medium text-slate-800 mb-2">Aman & Terpercaya</h3>
              <p class="text-slate-600">Data Anda dijamin keamanannya sesuai standar pemerintah</p>
            </div>
            
            <div class="text-center">
              <div class="w-16 h-16 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i data-lucide="users" class="w-8 h-8 text-white"></i>
              </div>
              <h3 class="text-xl font-medium text-slate-800 mb-2">Layanan Profesional</h3>
              <p class="text-slate-600">Didukung oleh pegawai DJBC yang berpengalaman</p>
            </div>
            
          </div>
        </div>
      </section>
  
      <!-- Services Section -->
      <section id="layanan" class="py-20 bg-white scroll-mt-20">
        <div class="container mx-auto px-4">
          <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-800 mb-4">Layanan Tatap Muka DJBC</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
              Pilih layanan yang sesuai dengan kebutuhan Anda. Setiap layanan memiliki persyaratan dokumen yang berbeda berdasarkan kategori pengguna.
            </p>
          </div>
  
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            
            <!-- Service Card 1 -->
            <a href="/layanan"> 
              <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                  <i data-lucide="file-text" class="w-7 h-7 text-white"></i>
                </div>
                
                <h3 class="text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                  Informasi Kepabeanan & Cukai
                </h3>
                
                <p class="text-slate-600 mb-4">
                  Konsultasi umum terkait peraturan kepabeanan dan cukai
                </p>
                
                <div class="flex items-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                  <span class="text-sm font-medium">Ajukan Sekarang</span>
                  <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                </div>
              </div>
            </a>
            
            <!-- Service Card 2 -->
            <a href="layanan.html?serviceId=klasifikasi">
              <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                  <i data-lucide="package" class="w-7 h-7 text-white"></i>
                </div>
                <h3 class="text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                  Klasifikasi Barang
                </h3>
                <p class="text-slate-600 mb-4">
                  Layanan klasifikasi barang impor/ekspor (Khusus Perusahaan)
                </p>
                <div class="flex items-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                  <span class="text-sm font-medium">Ajukan Sekarang</span>
                  <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                </div>
              </div>
            </a>
            
            <!-- Service Card 3 -->
            <a href="layanan.html?serviceId=fasilitas">
              <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                  <i data-lucide="gift" class="w-7 h-7 text-white"></i>
                </div>
                <h3 class="text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                  Fasilitas Pembebasan
                </h3>
                <p class="text-slate-600 mb-4">
                  Permohonan fasilitas pembebasan bea masuk (Khusus Perusahaan)
                </p>
                <div class="flex items-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                  <span class="text-sm font-medium">Ajukan Sekarang</span>
                  <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                </div>
              </div>
            </a>
  
            <!-- Service Card 4 -->
            <a href="layanan.html?serviceId=pengaduan">
              <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm hover:shadow-xl transition-all duration-300 group border-2 border-transparent hover:border-[#d4af37] h-full">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                  <i data-lucide="message-square" class="w-7 h-7 text-white"></i>
                </div>
                <h3 class="text-xl font-medium text-slate-800 mb-2 group-hover:text-[#003d82] transition-colors">
                  Pengaduan
                </h3>
                <p class="text-slate-600 mb-4">
                  Layanan pengaduan dan aspirasi masyarakat
                </p>
                <div class="flex items-center text-[#003d82] group-hover:text-[#d4af37] transition-colors">
                  <span class="text-sm font-medium">Ajukan Sekarang</span>
                  <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform"></i>
                </div>
              </div>
            </a>
            
          </div>
        </div>
      </section>
  
      <!-- Info Section -->
      <section id="informasi" class="py-20 bg-slate-50 scroll-mt-20">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
              <h2 class="text-3xl font-bold text-slate-800 mb-4">Informasi Layanan</h2>
              <p class="text-lg text-slate-600">
                Ketentuan dan prosedur layanan tatap muka DJBC
              </p>
            </div>
  
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Info Card 1 -->
              <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm border-l-4 border-[#003d82]">
                <h3 class="text-xl font-medium text-slate-800 mb-3">Jam Pelayanan</h3>
                <div class="space-y-2 text-slate-600">
                  <p class="flex items-start gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                    Senin - Jumat: 08.00 - 15.00 WIB
                  </p>
                  <p class="flex items-start gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                    Istirahat: 12.00 - 13.00 WIB
                  </p>
                </div>
              </div>
  
              <!-- Info Card 2 -->
              <div class="p-6 rounded-lg border bg-card text-card-foreground shadow-sm border-l-4 border-[#d4af37]">
                <h3 class="text-xl font-medium text-slate-800 mb-3">Persyaratan Umum</h3>
                <div class="space-y-2 text-slate-600">
                  <p class="flex items-start gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                    Dokumen identitas yang masih berlaku
                  </p>
                  <p class="flex items-start gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5"></i>
                    Dokumen pendukung sesuai jenis layanan
                  </p>
                </div>
              </div>
            </div>
  
            <!-- Info Card 3 - Alur -->
            <div class="p-8 bg-gradient-to-br from-[#003d82] to-[#0052a3] text-white mt-6 relative overflow-hidden rounded-lg shadow-sm">
              <div class="absolute top-0 right-0 w-32 h-32 bg-[#d4af37] rounded-full -mr-16 -mt-16 opacity-20"></div>
              <div class="absolute bottom-0 left-0 w-24 h-24 bg-[#d4af37] rounded-full -ml-12 -mb-12 opacity-20"></div>
              
              <div class="relative z-10">
                <h3 class="text-xl font-medium text-white mb-3">Alur Pengajuan Layanan</h3>
                <ol class="space-y-3 text-slate-100">
                  <li class="flex items-start gap-3">
                    <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">1</span>
                    <span>Pilih jenis layanan yang dibutuhkan</span>
                  </li>
                  <li class="flex items-start gap-3">
                    <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">2</span>
                    <span>Pilih kategori pengguna (Perusahaan/Pemerintah/Perorangan/Firma Hukum)</span>
                  </li>
                  <li class="flex items-start gap-3">
                    <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">3</span>
                    <span>Isi formulir dan unggah dokumen persyaratan</span>
                  </li>
                  <li class="flex items-start gap-3">
                    <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">4</span>
                    <span>Menunggu validasi dari petugas admin (via email)</span>
                  </li>
                  <li class="flex items-start gap-3">
                    <span class="w-7 h-7 bg-[#d4af37] rounded-full flex items-center justify-center flex-shrink-0 text-[#003d82] font-medium">5</span>
                    <span>Dapatkan nomor antrian dan datang sesuai jadwal</span>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- Footer with Batik Pattern -->
  <footer class="bg-gradient-to-br from-[#003d82] to-[#002754] text-white mt-20 relative overflow-hidden">
    <!-- Batik Pattern Overlay -->
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
          <button
            id="survey-btn-footer"
            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-9 px-3 gap-2 border border-white/30 text-white hover:bg-white/10"
          >
            <i data-lucide="star" class="w-4 h-4"></i>
            Survey Kepuasan
          </button>
        </div>
      </div>
    </div>
  </footer>

  <!-- Survey Modal HTML -->
  <div id="survey-dialog" class="survey-dialog">
    <div class="survey-content">
      <i id="survey-close-btn" data-lucide="x" class="survey-close-btn"></i>
      <h3 class="text-lg font-medium text-slate-800 text-center">Survey Kepuasan Layanan</h3>
      <p class="text-sm text-slate-600 text-center mb-4">Seberapa puas Anda dengan layanan kami?</p>
      
      <div class="survey-stars">
        <i data-lucide="star" data-value="1"></i>
        <i data-lucide="star" data-value="2"></i>
        <i data-lucide="star" data-value="3"></i>
        <i data-lucide="star" data-value="4"></i>
        <i data-lucide="star" data-value="5"></i>
      </div>
      
      <textarea
        placeholder="Berikan masukan Anda..."
        class="w-full p-2 border rounded-md min-h-24 text-sm text-slate-700 border-slate-300"
      ></textarea>
      
      <button class="w-full mt-4 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 bg-[#003d82] text-white hover:bg-[#002754]">
        Kirim Penilaian
      </button>
    </div>
  </div>

  
  <!-- 5. Inisialisasi Lucide Icons & JS -->
  <script>
    lucide.createIcons();

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = mobileMenuBtn.querySelector('[data-lucide="menu"]');
    const xIcon = mobileMenuBtn.querySelector('[data-lucide="x"]');

    mobileMenuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      menuIcon.classList.toggle('hidden');
      xIcon.classList.toggle('hidden');
    });

    // Survey Modal Toggle
    const surveyDialog = document.getElementById('survey-dialog');
    const surveyBtnFooter = document.getElementById('survey-btn-footer');
    const surveyCloseBtn = document.getElementById('survey-close-btn');

    function openSurvey() {
      surveyDialog.style.display = 'flex';
    }
    function closeSurvey() {
      surveyDialog.style.display = 'none';
    }

    surveyBtnFooter.addEventListener('click', openSurvey);
    surveyCloseBtn.addEventListener('click', closeSurvey);
    
    // Survey Stars
    const stars = document.querySelectorAll('.survey-stars i');
    stars.forEach(star => {
      star.addEventListener('click', () => {
        const value = parseInt(star.getAttribute('data-value'));
        stars.forEach((s, i) => {
          if (i < value) {
            s.classList.add('selected');
            s.setAttribute('fill', 'currentColor'); // Fill star
          } else {
            s.classList.remove('selected');
             s.removeAttribute('fill'); // Unfill star
          }
        });
      });
    });

    // Close dialog on outside click
    window.addEventListener('click', (event) => {
      if (event.target == surveyDialog) {
        closeSurvey();
      }
    });
  </script>
</body>
</html>