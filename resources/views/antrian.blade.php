<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Antrian Anda - Sistem Informasi Layanan Tatap Muka - DJBC</title>
  
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

    /* Print styles */
    @media print {
      /* Sembunyikan semua elemen kecuali tiket antrian */
      body > *:not(.print-area) {
        display: none;
      }
      /* Pastikan area print mengambil seluruh layar */
      .print-area, .print-area .print-content {
        display: block;
        margin: 0;
        padding: 0;
        width: 100%;
        max-width: 100%;
        box-shadow: none;
        border: none;
      }
      /* Sembunyikan tombol di dalam tiket saat print */
      .print-area .no-print {
        display: none;
      }
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
  <header class="bg-white shadow-md sticky top-0 z-50 no-print">
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
          <!-- Link Antrian kita buat Aktif -->
          <a href="antrian.html" class="px-4 py-2 rounded-lg transition-colors bg-[#003d82] text-white">
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
        <a href="index.html#layanan" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Layanan Tatap Muka
        </a>
        <a href="index.html#informasi" class="block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100">
          Informasi
        </a>
        <a href="antrian.html" class="block px-4 py-2 rounded-lg bg-[#003d82] text-white">
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

  <!-- Main Content -->
  <!-- 'print-area' membungkus semua yang ingin kita print -->
  <main class="flex-1 print-area">
    <div class="bg-slate-50 min-h-screen py-12">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
          <!-- Header Halaman -->
          <div class="text-center mb-12 no-print">
            <h1 class="text-3xl font-bold text-slate-800 mb-4">Sistem Antrian</h1>
            <p class="text-lg text-slate-600">Layanan Tatap Muka DJBC</p>
          </div>

          <!--
            INI ADALAH TAMPILAN TIKET (SESUAI JSX 'queueData ? ...')
            'print-content' adalah bagian spesifik yang akan di-print
          -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-8 mb-8 bg-gradient-to-br from-white to-slate-50 border-2 border-[#d4af37] shadow-xl print-content">
            <div class="text-center mb-6">
              <div class="inline-block p-4 bg-gradient-to-br from-[#003d82] to-[#0052a3] rounded-2xl mb-4">
                <i data-lucide="ticket" class="w-12 h-12 text-white"></i>
              </div>
              <h2 class="text-2xl font-medium text-slate-800 mb-2">Nomor Antrian Anda</h2>
              <div class="text-8xl font-bold text-[#003d82] mb-4">
                A-102
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
                <p class="text-lg font-medium text-slate-900">10:30 WIB</p>
              </div>

              <div class="text-center p-4 bg-white rounded-lg border border-slate-200">
                <i data-lucide="calendar" class="w-6 h-6 text-[#003d82] mx-auto mb-2"></i>
                <p class="text-sm text-slate-600 mb-1">Tanggal</p>
                <!-- ID ini digunakan oleh JS untuk mengisi tanggal hari ini -->
                <p class="text-lg font-medium text-slate-900" id="current-date">...</p>
              </div>

              <div class="text-center p-4 bg-white rounded-lg border border-slate-200">
                <i data-lucide="map-pin" class="w-6 h-6 text-[#003d82] mx-auto mb-2"></i>
                <p class="text-sm text-slate-600 mb-1">Lokasi</p>
                <p class="text-lg font-medium text-slate-900">Loket Informasi</p>
              </div>
            </div>

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

          <!-- Informasi Penting -->
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
              <li class="flex items-start gap-2">
                <i data-lucide="check-circle" class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"></i>
                <span>Tunjukkan nomor antrian ini kepada petugas</span>
              </li>
              <li class="flex items-start gap-2">
                <i data-lucide="check-circle" class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"></i>
                <span>Antrian hangus jika tidak hadir dalam <strong>30 menit</strong> setelah dipanggil</span>
              </li>
            </ul>
          </div>

          <!-- Survey Button -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 bg-gradient-to-r from-[#003d82] to-[#0052a3] text-white mb-8 no-print">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
              <div class="flex-1 text-center sm:text-left">
                <h3 class="text-lg font-medium text-white mb-2">Bantu Kami Meningkatkan Layanan</h3>
                <p class="text-slate-100 text-sm">
                  Berikan penilaian Anda terhadap pelayanan kami
                </p>
              </div>
              <button id="survey-btn" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 bg-[#d4af37] hover:bg-[#c4a02e] text-[#003d82] gap-2 ml-4 flex-shrink-0">
                <i data-lucide="star" class="w-4 h-4"></i>
                Survey Kepuasan
              </button>
            </div>
          </div>

          <!-- Service Hours -->
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 bg-gradient-to-br from-[#003d82] to-[#0052a3] text-white no-print">
            <div class="text-center">
              <i data-lucide="clock" class="w-10 h-10 mx-auto mb-3 text-[#d4af37]"></i>
              <h3 class="text-xl font-medium text-white mb-3">Jam Pelayanan</h3>
              <div class="space-y-2">
                <p class="text-slate-100">Senin - Jumat</p>
                <p class="text-2xl text-white font-medium">08.00 - 15.00 WIB</p>
                <p class="text-sm text-slate-300">(Istirahat: 12.00 - 13.00 WIB)</p>
              </div>
            </div>
          </div>

          <!-- Contact Information -->
          <div class="mt-8 text-center no-print">
            <p class="text-slate-600 text-sm mb-2">
              Butuh bantuan? Hubungi kami:
            </p>
            <p class="text-slate-800 font-medium">
              <strong>Telp:</strong> (021) 4890308 | <strong>Email:</strong> info@beacukai.go.id
            </p>
            <p class="text-xs text-slate-600 mt-4">
              Lokasi Pelayanan: <strong>Gedung Papua, Kantor Pusat DJBC</strong>, Jl. Jenderal Ahmad Yani, Jakarta
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Survey Modal HTML (dari index.html) -->
  <div id="survey-dialog" class="survey-dialog no-print">
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
  <footer class="bg-gradient-to-br from-[#003d82] to-[#002754] text-white mt-20 relative overflow-hidden no-print">
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

    // 3. Mengisi Tanggal Hari Ini
    const dateEl = document.getElementById('current-date');
    if(dateEl) {
      dateEl.textContent = new Date().toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
      });
    }

    // 4. Fungsi Print
    const printBtn = document.getElementById('print-btn');
    if(printBtn) {
      printBtn.addEventListener('click', () => {
        window.print();
      });
    }

    // 5. Survey Modal Toggle (dari index.html)
    const surveyDialog = document.getElementById('survey-dialog');
    const surveyBtn = document.getElementById('survey-btn');
    const surveyCloseBtn = document.getElementById('survey-close-btn');

    function openSurvey() {
      if(surveyDialog) surveyDialog.style.display = 'flex';
    }
    function closeSurvey() {
      if(surveyDialog) surveyDialog.style.display = 'none';
    }

    if(surveyBtn) surveyBtn.addEventListener('click', openSurvey);
    if(surveyCloseBtn) surveyCloseBtn.addEventListener('click', closeSurvey);
    
    // 6. Survey Stars (dari index.html)
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

    // 7. Close dialog on outside click (dari index.html)
    window.addEventListener('click', (event) => {
      if (event.target == surveyDialog) {
        closeSurvey();
      }
    });
    
  </script>
</body>
</html>