<x-user-layout>
    <x-slot:heading>
        KARTU KELUARGA
    </x-slot:heading>

    <div class="w-full flex flex-col gap-3">
        @foreach ($kartukeluargas as $kartukeluarga)
        <a href="{{ route('user.kartu_keluarga.edit', $kartukeluarga) }}" class="border border-dashed w-full rounded-sm">
            <span>No KK: {{ $kartukeluarga->no_kk }}</span>
            <span>No KK: {{ $kartukeluarga->kepala_keluarga }}</span>
            
            @if ($kartukeluarga->penduduk->isNotEmpty())
                <ul>
                    @foreach ($kartukeluarga->penduduk as $warga)
                        <li>{{ $warga->nama }}</li>
                    @endforeach
                </ul>
            @else
                <p><em>Tidak ada penduduk terdaftar</em></p>
            @endif
        </a>
        @endforeach
    </div>
</x-user-layout>