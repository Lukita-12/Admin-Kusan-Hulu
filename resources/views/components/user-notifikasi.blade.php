<x-layout>
    <div class="space-y-4">
        @foreach($surats as $surat)
        <div class="flex flex-col bg-white p-4 rounded-md shadow">
            <div class="flex items-center justify-between mb-2">
                {{-- Nama Penduduk --}}
                <span class="font-bold">{{ $surat->dataPenduduk->nama }}</span>

                {{-- Status --}}
                <span class="font-semibold capitalize">{{ $surat->status }}</span>
            </div>

            {{-- Info Jenis Surat --}}
            <div class="mb-2 text-sm text-gray-500 italic">
                {{ class_basename($surat) }}
            </div>

            <!-- Stepper Progress -->
            <div class="flex items-center justify-between w-full">
                {{-- Step 1: Diajukan --}}
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center
                        {{ in_array($surat->status, ['Diajukan', 'Diproses', 'Selesai', 'Ditolak']) ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                        1
                    </div>
                    <span class="ml-2 text-sm">Diajukan</span>
                </div>

                {{-- Divider Step 1-2 --}}
                @if($surat->status == 'Ditolak')
                    <div class="flex-1 border-t-2 border-green-500"></div>
                @elseif(in_array($surat->status, ['Diproses', 'Selesai']))
                    <div class="flex-1 border-t-2 border-green-500"></div>
                @else
                    <div class="flex-1 border-t-2 border-gray-300"></div>
                @endif

                {{-- Step 2: Ditolak (jika status == Ditolak) --}}
                @if($surat->status == 'Ditolak')
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center bg-red-500 text-white">
                        2
                    </div>
                    <span class="ml-2 text-sm">Ditolak</span>
                </div>
                @endif

                {{-- Divider Step 2-3 --}}
                @if($surat->status == 'Ditolak')
                    <div class="flex-1 border-t-2 border-gray-300"></div>
                @elseif(in_array($surat->status, ['Diproses', 'Selesai']))
                    <div class="flex-1 border-t-2 border-green-500"></div>
                @else
                    <div class="flex-1 border-t-2 border-gray-300"></div>
                @endif

                {{-- Step 3: Diproses --}}
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center
                        {{ in_array($surat->status, ['Diproses', 'Selesai']) ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                        {{ $surat->status == 'Ditolak' ? '3' : ($surat->status == 'Selesai' ? '3' : '2') }}
                    </div>
                    <span class="ml-2 text-sm">Diproses</span>
                </div>

                {{-- Divider Step 3-4 --}}
                <div class="flex-1 border-t-2
                    {{ $surat->status == 'Selesai' ? 'border-green-500' : 'border-gray-300' }}">
                </div>

                {{-- Step 4: Selesai --}}
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center
                        {{ $surat->status == 'Selesai' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                        {{ $surat->status == 'Ditolak' ? '4' : ($surat->status == 'Selesai' ? '4' : '3') }}
                    </div>
                    <span class="ml-2 text-sm">Selesai</span>
                </div>
            </div>

            {{-- Keterangan Tambahan --}}
            @if($surat->status == 'Ditolak')
                <div class="mt-2 p-2 bg-red-100 text-red-700 rounded">
                    Permohonan Anda ditolak. Silakan isi ulang data Anda.
                </div>
            @elseif($surat->status == 'Diajukan')
                <div class="mt-2 p-2 bg-yellow-100 text-yellow-700 rounded">
                    Permohonan Anda sedang diajukan. Mohon tunggu verifikasi.
                </div>
            @elseif($surat->status == 'Diproses')
                <div class="mt-2 p-2 bg-blue-100 text-blue-700 rounded">
                    Permohonan Anda sedang diproses. Mohon tunggu.
                </div>
            @elseif($surat->status == 'Selesai')
                <div class="mt-2 p-2 bg-green-100 text-green-700 rounded">
                    Surat Anda Telah Selesai 
                </div>

                {{-- Tombol Lihat Surat --}}
                <div class="mt-3">
                    @php
                        $routeName = match (class_basename($surat)) {
                            'DomisiliUsaha' => 'domisili-usaha.show',
                            'PindahDomisili' => 'pindah-domisili.show',
                            'DomisiliPenduduk' => 'domisili-penduduk.show',
                            default => null
                        };
                    @endphp

                    @if($routeName)
                    <a href="{{ route($routeName, $surat->id) }}" target="_blank"
                       class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Lihat Surat
                    </a>
                    @endif
                </div>
            @endif

        </div>
        @endforeach
    </div>
</x-layout>
