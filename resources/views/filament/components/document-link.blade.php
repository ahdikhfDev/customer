<div class="py-2">
    {{-- $getRecord() mengambil model ApplicationDocument saat ini di dalam loop repeater --}}
    @php
        $doc = $getRecord();
    @endphp
    
    @if($doc && $doc->file_path)
        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="text-primary-600 underline hover:text-primary-500 flex items-center gap-2">
            <x-heroicon-o-document-arrow-down class="w-4 h-4"/>
            Lihat / Download File
        </a>
    @else
        <span class="text-gray-400">File tidak ditemukan</span>
    @endif
</div>