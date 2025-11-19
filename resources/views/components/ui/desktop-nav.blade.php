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

<nav class="hidden lg:flex items-center gap-1">
  @foreach($navItems as $key => $item)
    @php
      $isActive = $active === $key;
      $classes = $isActive 
        ? 'px-4 py-2 rounded-lg transition-colors bg-[#003d82] text-white' 
        : 'px-4 py-2 rounded-lg transition-colors text-slate-700 hover:bg-slate-100';
    @endphp
    <a href="{{ $item['url'] }}" class="{{ $classes }}">
      {{ $item['label'] }}
    </a>
  @endforeach
</nav>