<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hubungi Kami - Sistem Informasi Layanan Tatap Muka - DJBC</title>
  
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
      --input: #f3f3f5;
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

    /* Style untuk Survey Dialog (Dari index.html) */
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
    
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            border: 'var(--border)',
            input: 'var(--input)',
            ring: 'var(--ring)',
            background: 'var(--background)',
            foreground: 'var(--foreground)',
            primary: { DEFAULT: 'var(--primary)', foreground: 'var(--primary-foreground)'},
            secondary: { DEFAULT: 'var(--secondary)', foreground: 'var(--secondary-foreground)'},
            destructive: { DEFAULT: 'var(--destructive)', foreground: 'var(--destructive-foreground)'},
            muted: { DEFAULT: 'var(--muted)', foreground: 'var(--muted-foreground)'},
            accent: { DEFAULT: 'var(--accent)', foreground: 'var(--accent-foreground)'},
            popover: { DEFAULT: 'var(--popover)', foreground: 'var(--popover-foreground)'},
            card: { DEFAULT: 'var(--card)', foreground: 'var(--card-foreground)'},
          },
          borderRadius: { lg: 'var(--radius)', md: 'calc(var(--radius) - 2px)', sm: 'calc(var(--radius) - 4px)'},
          fontWeight: { medium: 'var(--font-weight-medium)', normal: 'var(--font-weight-normal)'}
        }
      }
    }
  </style>
</head>
<body class="antialiased min-h-screen bg-slate-50 flex flex-col">

  <!-- Header -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="h-2 bg-gradient-to-r from-[#003d82] via-[#0052a3] to-[#003d82]"></div>
    <div class="h-1 bg-[#d4af37]"></div>
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
          <a href="index.html#layanan" class="px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100">
            Layanan Tatap Muka
          </a>
          <a href="index.html#informasi" class="px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100">
            Informasi
          </a>
          <a href="antrian.html" class="px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100">
            Antrian
          </a>
          <!-- Link Kontak kita buat Aktif -->
          <a href="kontak.html" class="px-4 py-2 rounded-lg transition-colors bg-[#003d82] text-white">
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
        <a href="index.html#layanan" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Layanan Tatap Muka
        </a>
        <a href="index.html#informasi" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Informasi
        </a>
        <a href="antrian.html" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Antrian
        </a>
        <a href="kontak.html" class="block px-4 py-2 rounded-lg bg-[#003d82] text-white">
          Kontak
        </a>
        <a href="#"> <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 border border-[#003d82] text-[#003d82]">
            Portal Admin
          </button>
        </a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-1">
    <div class="bg-slate-50 min-h-screen py-12">
      <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
          <!-- Header -->
          <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-slate-800 mb-4">Hubungi Kami</h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
              Kami siap membantu Anda dengan informasi layanan kepabeanan dan cukai
            </p>
          </div>

          <!-- Contact Cards -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            
            <!-- Card 1: Alamat -->
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

            <!-- Card 2: Telepon -->
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

            <!-- Card 3: Email -->
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
            
            <!-- Card 4: Jam Layanan -->
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

          <!-- Online Services -->
          <div class="p-8 bg-gradient-to-br from-[#003d82] to-[#0052a3] text-white relative overflow-hidden rounded-lg shadow-lg">
            <div class="absolute top-0 right-0 w-32 h-32 bg-[#d4af37] rounded-full -mr-16 -mt-16 opacity-20"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-[#d4af37] rounded-full -ml-12 -mb-12 opacity-20"></div>
            
            <div class="relative z-10">
              <h2 class="text-2xl font-medium text-white mb-6 text-center">Layanan Online</h2>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Website Resmi -->
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
                <!-- Live Chat -->
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

          <!-- Map Placeholder -->
          <div class="mt-8 p-0 overflow-hidden rounded-lg border bg-card text-card-foreground shadow-sm">
            <!-- Anda bisa mengganti ini dengan iframe Google Maps -->
            <div class="bg-slate-200 h-96 flex items-center justify-center">
              <div class="text-center text-slate-500">
                <i data-lucide="map-pin" class="w-16 h-16 mx-auto mb-4"></i>
                <p class="text-lg font-medium">Peta Lokasi</p>
                <p class="text-sm">(Contoh placeholder untuk Google Maps)</p>
              </div>
            </div>
          </div>

          <!-- Social Media -->
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
  </main>

  <!-- Survey Modal HTML (dari index.html) -->
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

  <!-- Footer -->
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
          <!-- Tombol Survey dari index.html -->
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
  
  <script>
    // 1. Inisialisasi semua ikon
    lucide.createIcons();

    // 2. Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = mobileMenuBtn.querySelector('[data-lucide="menu"]');
    const xIcon = mobileMenuBtn.querySelector('[data-lucide="x"]');

    mobileMenuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      menuIcon.classList.toggle('hidden');
      xIcon.classList.toggle('hidden');
    });

    // 3. Survey Modal Toggle (dari index.html)
    const surveyDialog = document.getElementById('survey-dialog');
    const surveyBtnFooter = document.getElementById('survey-btn-footer');
    const surveyCloseBtn = document.getElementById('survey-close-btn');

    function openSurvey() {
      if(surveyDialog) surveyDialog.style.display = 'flex';
    }
    function closeSurvey() {
      if(surveyDialog) surveyDialog.style.display = 'none';
    }

    if(surveyBtnFooter) surveyBtnFooter.addEventListener('click', openSurvey);
    if(surveyCloseBtn) surveyCloseBtn.addEventListener('click', closeSurvey);
    
    // 4. Survey Stars (dari index.html)
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

    // 5. Close dialog on outside click (dari index.html)
    window.addEventListener('click', (event) => {
      if (event.target == surveyDialog) {
        closeSurvey();
      }
    });
    
  </script>
</body>
</html>