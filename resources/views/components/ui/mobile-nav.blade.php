@props(['active'])
@php
  $navItems = [
    'beranda' => ['label' => 'Beranda', 'url' => url('/'), 'hash' => null],
    'layanan' => ['label' => 'Layanan Tatap Muka', 'url' => url('/#layanan'), 'hash' => '#layanan'],
    'informasi' => ['label' => 'Informasi', 'url' => url('/#informasi'), 'hash' => '#informasi'],
    'antrian' => ['label' => 'Antrian', 'url' => url('/antrian'), 'hash' => null],
    'kontak' => ['label' => 'Kontak', 'url' => url('/kontak'), 'hash' => null],
  ];
@endphp

<nav id="mobile-menu" class="lg:hidden pb-4 space-y-2 hidden">
  @foreach($navItems as $key => $item)
    @php
      $isActive = $active === $key;
      $classes = $isActive 
        ? 'block px-4 py-2 rounded-lg bg-[#003d82] text-white' 
        : 'block px-4 py-2 rounded-lg text-slate-700 hover:bg-slate-100';
    @endphp
    <a href="{{ $item['url'] }}" class="{{ $classes }}">
      {{ $item['label'] }}
    </a>
  @endforeach
  <a href="#">
    <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 border border-[#003d82] text-[#003d82]">
      Portal Admin
    </button>
  </a>
</nav>