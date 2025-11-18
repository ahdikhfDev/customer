<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Isi Data & Dokumen - Sistem Informasi Layanan Tatap Muka - DJBC</title>
  
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
      --input: #f3f3f5; /* Warna input agar terlihat */
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
    
    /* STYLE UNTUK FORM & HOVER EFFECT (DARI PERMINTAAN SEBELUMNYA)
    */
    .form-label {
      display: block;
      margin-bottom: 0.25rem; /* mb-1 */
      font-size: 0.875rem; /* text-sm */
      font-weight: 500; /* font-medium */
      color: #374151; /* text-gray-700 */
    }
    .form-label .required-star {
      color: var(--destructive);
    }
    
    .form-input, .form-textarea {
      display: block;
      width: 100%;
      border-radius: 0.5rem; /* rounded-md */
      border: 1px solid var(--border);
      background-color: var(--input-background);
      padding: 0.625rem 0.75rem; /* py-2.5 px-3 */
      font-size: 0.875rem; /* text-sm */
      color: var(--foreground);
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    
    .form-input:focus, .form-textarea:focus {
      outline: none;
      border-color: #003d82;
      box-shadow: 0 0 0 2px rgba(0, 61, 130, 0.2); /* ring-2 ring-offset-2 */
    }
    
    /* Style untuk area upload file (sesuai request hover) */
    .file-upload-area {
      border: 2px dashed var(--border);
      border-radius: 0.75rem; /* rounded-lg */
      padding: 1.5rem; /* p-6 */
      text-align: center;
      cursor: pointer;
      transition: background-color 0.2s, border-color 0.2s;
    }
    
    /* EFEK HOVER FILE UPLOAD */
    .file-upload-area:hover {
      background-color: #f9fafb; /* bg-gray-50 */
      border-color: #003d82; /* border-[#003d82] */
    }

    .file-upload-area i {
      width: 2rem; /* w-8 */
      height: 2rem; /* h-8 */
      color: #9ca3af; /* text-gray-400 */
      margin-bottom: 0.5rem; /* mb-2 */
    }
    
    /* Sembunyikan input file asli */
    .hidden-file-input {
      display: none;
    }

    /* Tampilan nama file (jika ada) */
    .file-name-preview {
      display: block;
      margin-top: 0.5rem;
      font-size: 0.875rem;
      color: #16a34a; /* text-green-600 */
      font-weight: 500;
      text-align: center;
    }

    /* Style dari Tailwind Config */
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

  <!-- Header (Sama seperti halaman lain) -->
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

  <!-- Main Content -->
  <main class="flex-1">
    <div class="bg-slate-50 min-h-screen py-12">
      <div class="container mx-auto px-4">
        
        <!-- 1. Breadcrumb (Hardcoded) -->
        <div id="breadcrumb-container" class="mb-8">
          <a href="index.html" class="text-slate-600 hover:text-[#003d82]">Beranda</a>
          <span class="mx-2 text-slate-400">/</span>
          <!-- Kita pura-pura ini halaman "Klasifikasi" -->
          <a href="layanan.html" class="text-slate-600 hover:text-[#003d82]">Klasifikasi Barang</a>
          <span class="mx-2 text-slate-400">/</span>
          <span class="text-slate-800">Formulir</span>
        </div>
        
        <!-- 2. Header (Hardcoded) -->
        <div id="header-container" class="text-center mb-12">
          <!-- Pura-pura untuk "Perusahaan" -->
          <h1 class="text-3xl font-bold text-slate-800 mb-2">Klasifikasi Barang</h1>
          <p class="text-lg text-slate-600">Kategori: Perusahaan</p>
        </div>

        <!-- 3. Konten Utama (Step Indicator & Form) -->
        <div id="main-content-container">
          <!-- STEP INDICATOR (Step 2 Aktif) -->
          <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between">
              <!-- Step 1 (Completed) -->
              <div class="flex items-center flex-1">
                <div class="flex flex-col items-center flex-1">
                  <div class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 bg-green-500 text-white">
                    <i data-lucide="check" class="w-6 h-6"></i>
                  </div>
                  <span class="mt-2 text-sm text-center transition-colors text-slate-800">
                    Pilih Pengguna
                  </span>
                </div>
                <div class="h-1 flex-1 mx-2 transition-all duration-300 bg-green-500" style="margin-bottom: 2.5rem;"></div>
              </div>
              
              <!-- Step 2 (Active) -->
              <div class="flex items-center flex-1">
                <div class="flex flex-col items-center flex-1">
                  <div class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 bg-[#003d82] text-white ring-4 ring-[#003d82]/20">
                    <span>2</span>
                  </div>
                  <span class="mt-2 text-sm text-center transition-colors text-slate-800">
                    Isi Data & Dokumen
                  </span>
                </div>
                <div class="h-1 flex-1 mx-2 transition-all duration-300 bg-slate-200" style="margin-bottom: 2.5rem;"></div>
              </div>
              
              <!-- Step 3 (Inactive) -->
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
              
              <!-- Step 4 (Inactive) -->
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

          <!-- KARTU FORMULIR (Berdasarkan JSX) -->
          <div class="p-8 max-w-3xl mx-auto mt-12 rounded-lg border bg-card text-card-foreground shadow-sm">
            <div class="mb-6">
              <h2 class="text-xl font-medium text-slate-800 mb-2">Formulir Pengajuan</h2>
              <p class="text-slate-600">Lengkapi data dan unggah dokumen persyaratan</p>
            </div>

            <div class="space-y-6">
              <!-- Data Pribadi -->
              <div class="space-y-4">
                <h3 class="text-lg font-medium text-slate-800">Data Diri</h3>
                
                <div>
                  <label for="fullName" class="form-label">Nama Lengkap <span class="required-star">*</span></label>
                  <input type="text" id="fullName" class="form-input" placeholder="Masukkan nama lengkap">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label for="email" class="form-label">Email <span class="required-star">*</span></label>
                    <input type="email" id="email" class="form-input" placeholder="email@contoh.com">
                  </div>

                  <div>
                    <label for="phone" class="form-label">Nomor Telepon <span class="required-star">*</span></label>
                    <input type="tel" id="phone" class="form-input" placeholder="08xxxxxxxxxx">
                  </div>
                </div>

                <div>
                  <label for="question" class="form-label">Keperluan / Pertanyaan <span class="required-star">*</span></label>
                  <textarea id="question" class="form-textarea" placeholder="Jelaskan keperluan atau pertanyaan Anda secara detail" rows="5"></textarea>
                </div>
              </div>

              <!-- Dokumen (Hardcoded untuk 'Perusahaan') -->
              <div class="space-y-4 pt-6 border-t">
                <h3 class="text-lg font-medium text-slate-800">Dokumen Persyaratan</h3>
                
                <!-- Upload 1 -->
                <div>
                  <label class="form-label">ID Card <span class="required-star">*</span></label>
                  <label for="file_idCard" class="file-upload-area flex flex-col items-center justify-center">
                    <i data-lucide="upload-cloud"></i>
                    <span class="text-sm text-slate-600">Seret file, atau <span class="text-[#003d82] font-medium">klik untuk unggah</span></span>
                    <span class="text-xs text-slate-400 mt-1">PDF, JPG, PNG (Maks. 1MB)</span>
                  </label>
                  <input type="file" id="file_idCard" class="hidden-file-input">
                  <span class="file-name-preview" id="file_idCard_preview"></span>
                </div>

                <!-- Upload 2 -->
                <div>
                  <label class="form-label">SKB (Surat Keterangan Bekerja) <span class="required-star">*</span></label>
                  <label for="file_skb" class="file-upload-area flex flex-col items-center justify-center">
                    <i data-lucide="upload-cloud"></i>
                    <span class="text-sm text-slate-600">Seret file, atau <span class="text-[#003d82] font-medium">klik untuk unggah</span></span>
                    <span class="text-xs text-slate-400 mt-1">PDF, JPG, PNG (Maks. 1MB)</span>
                  </label>
                  <input type="file" id="file_skb" class="hidden-file-input">
                  <span class="file-name-preview" id="file_skb_preview"></span>
                </div>

                <!-- Upload 3 -->
                <div>
                  <label class="form-label">Surat Tugas dari Perusahaan (maks. H-5) <span class="required-star">*</span></label>
                  <label for="file_suratTugas" class="file-upload-area flex flex-col items-center justify-center">
                    <i data-lucide="upload-cloud"></i>
                    <span class="text-sm text-slate-600">Seret file, atau <span class="text-[#003d82] font-medium">klik untuk unggah</span></span>
                    <span class="text-xs text-slate-400 mt-1">PDF, JPG, PNG (Maks. 1MB)</span>
                  </label>
                  <input type="file" id="file_suratTugas" class="hidden-file-input">
                  <span class="file-name-preview" id="file_suratTugas_preview"></span>
                </div>

                <!-- Upload 4 (Opsional) -->
                <div>
                  <label class="form-label">Surat Kuasa (jika konsultasi perusahaan lain)</label>
                  <label for="file_suratKuasa" class="file-upload-area flex flex-col items-center justify-center">
                    <i data-lucide="upload-cloud"></i>
                    <span class="text-sm text-slate-600">Seret file, atau <span class="text-[#003d82] font-medium">klik untuk unggah</span></span>
                    <span class="text-xs text-slate-400 mt-1">PDF, JPG, PNG (Maks. 1MB)</span>
                  </label>
                  <input type="file" id="file_suratKuasa" class="hidden-file-input">
                  <span class="file-name-preview" id="file_suratKuasa_preview"></span>
                </div>

              </div>

              <!-- Info Box (dari JSX) -->
              <div class="p-4 bg-amber-50 border-l-4 border-amber-500 rounded-md">
                <div class="flex gap-3">
                  <div class="text-2xl pt-1">⚠️</div>
                  <div class="text-sm text-slate-700">
                    <p class="mb-2"><strong>Catatan:</strong></p>
                    <ul class="list-disc list-outside pl-4 space-y-1 text-slate-600">
                      <li>Maksimal ukuran file dokumen adalah <strong>1 MB</strong></li>
                      <li>Mohon melampirkan dokumen sesuai jenis pengguna jasa yang dipilih</li>
                      <li><strong>Jika dokumen tidak sesuai, maka pendaftaran pengunjung akan ditolak</strong></li>
                      <li>Format yang diterima: PDF, JPG, PNG</li>
                      <li>Pastikan dokumen terlihat jelas dan tidak blur</li>
                      <li>Untuk Surat Tugas Perusahaan: maksimal H-5 sebelum kedatangan</li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Actions -->
              <div class="flex gap-4 pt-6 border-t">
                <a href="layanan.html" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors gap-2">
                  <i data-lucide="arrow-left" class="w-4 h-4"></i>
                  Kembali
                </a>
                
                <a href="review.html" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-6 py-2 bg-[#003d82] text-white hover:bg-[#002754] transition-colors flex-1 gap-2">
                  Review & Kirim
                  <i data-lucide="send" class="w-4 h-4"></i>
                </a>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </main>

  <!-- Footer (Sama seperti halaman lain) -->
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

    // 3. (Opsional) Skrip kecil untuk menampilkan nama file
    // Ini cuma buat tampilan aja, biar lebih bagus
    document.querySelectorAll('.hidden-file-input').forEach(input => {
      input.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
          const previewEl = document.getElementById(event.target.id + '_preview');
          if (previewEl) {
            previewEl.textContent = file.name;
          }
        }
      });
    });
    
  </script>
</body>
</html>