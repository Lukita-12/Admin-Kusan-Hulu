<x-layout>
    <div class="space-y-4">
        @foreach($domisiliUsahas as $domisiliUsaha)
        <div class="flex flex-col bg-white p-4 rounded-md shadow">
            <div class="flex items-center justify-between mb-2">
                <span class="font-bold">{{ $domisiliUsaha->dataPenduduk->nama }}</span>
                <span class="font-semibold capitalize">{{ $domisiliUsaha->status }}</span>
            </div>

            <!-- Stepper Progress -->
            <div class="flex items-center justify-between w-full">
                {{-- Step 1: Diajukan --}}
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center
                        {{ in_array($domisiliUsaha->status, ['Diajukan', 'Diproses', 'Selesai']) ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                        1
                    </div>
                    <span class="ml-2 text-sm">Diajukan</span>
                </div>

                <div class="flex-1 border-t-2
                    {{ in_array($domisiliUsaha->status, ['Diproses', 'Selesai']) ? 'border-green-500' : 'border-gray-300' }}">
                </div>

                {{-- Step 2: Diproses --}}
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center
                        @if($domisiliUsaha->status == 'Ditolak')
                            bg-red-500 text-white
                        @elseif(in_array($domisiliUsaha->status, ['Diproses', 'Selesai']))
                            bg-green-500 text-white
                        @else
                            bg-gray-300 text-gray-600
                        @endif">
                        2
                    </div>
                    <span class="ml-2 text-sm">Diproses</span>
                </div>

                <div class="flex-1 border-t-2
                    {{ $domisiliUsaha->status == 'Selesai' ? 'border-green-500' : 'border-gray-300' }}">
                </div>

                {{-- Step 3: Selesai --}}
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center
                        {{ $domisiliUsaha->status == 'Selesai' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                        3
                    </div>
                    <span class="ml-2 text-sm">Selesai</span>
                </div>
            </div>

            {{-- Keterangan Tambahan --}}
            @if($domisiliUsaha->status == 'Ditolak')
                <div class="mt-2 p-2 bg-red-100 text-red-700 rounded">
                    Silahkan isi ulang data Anda.
                </div>
            @elseif($domisiliUsaha->status == 'Selesai')
                <div class="mt-2 p-2 bg-green-100 text-green-700 rounded">
                    Silahkan ambil surat Anda di Kecamatan Kusan Hulu.
                </div>
            @endif
        </div>
        @endforeach
    </div>
</x-layout>
