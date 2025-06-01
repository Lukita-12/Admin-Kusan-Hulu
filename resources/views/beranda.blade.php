<x-user-layout>
    <x-slot:heading>
        Beranda
    </x-slot:heading>
    @if(Auth::user()->dataPenduduk)
    
    @else
    <div class="bg-gray-300 px-4 py-2"> 
        <span class="text-lg text-gray-950 font-bold">
        SILAHKAN ISI DATA ANDA PADA DATA PENDUDUK TERLEBIH DAHULU!   
        </span>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- DOMISILI USAHA -->
        <a href="{{ route('user.domisili_usaha.create') }}" class="bg-slate-200 rounded-sm shadow shadow-slate-500 p-4">
            <div class="flex items-center gap-4">
                <x-heroicon-s-building-office class="w-16 h-16 text-slate-700" />
                <div class="flex flex-col">
                    <span class="font-semibold">DOMISILI USAHA</span>
                </div>
            </div>
        </a>

        <!-- DOMISILI PENDUDUK -->
        <a href="{{ route('user.domisili_penduduk.create') }}" class="bg-slate-200 rounded-sm shadow shadow-slate-500 p-4">
            <div class="flex items-center gap-4">
                <x-heroicon-s-user-group class="w-16 h-16 text-slate-700" />
                <div class="flex flex-col">
                    <span class="font-semibold">DOMISILI PENDUDUK</span>
                </div>
            </div>
        </a>

        <!-- PINDAH DOMISILI -->
        <a href="{{ route('user.domisili_usaha.create') }}" class="bg-slate-200 rounded-sm shadow shadow-slate-500 p-4">
            <div class="flex items-center gap-4">
                <x-heroicon-s-arrow-path class="w-16 h-16 text-slate-700" />
                <div class="flex flex-col">
                    <span class="font-semibold">PINDAH DOMISILI</span>
                </div>
            </div>
        </a>

        <!-- PERUBAHAN KK -->
        <a href="{{ route('user.kartu_keluarga.create') }}" class="bg-slate-200 rounded-sm shadow shadow-slate-500 p-4">
            <div class="flex items-center gap-4">
                <x-heroicon-s-identification class="w-16 h-16 text-slate-700" />
                <div class="flex flex-col">
                    <span class="font-semibold">PERUBAHAN KARTU KELUARGA</span>
                </div>
            </div>
        </a>

        <!-- AKTA KELAHIRAN -->
        <a href="{{ route('user.penerbitan_akta_kelahiran.create') }}" class="bg-slate-200 rounded-sm shadow shadow-slate-500 p-4">
            <div class="flex items-center gap-4">
                <x-heroicon-s-cake class="w-16 h-16 text-slate-700" />
                <div class="flex flex-col">
                    <span class="font-semibold">AKTA KELAHIRAN</span>
                </div>
            </div>
        </a>

        <!-- AKTA KEMATIAN -->
        <a href="{{ route('user.akta_kematian.create') }}" class="bg-slate-200 rounded-sm shadow shadow-slate-500 p-4">
            <div class="flex items-center gap-4">
                <x-heroicon-s-exclamation-circle class="w-16 h-16 text-slate-700" />
                <div class="flex flex-col">
                    <span class="font-semibold">AKTA KEMATIAN</span>
                </div>
            </div>
        </a>
    </div>
</x-user-layout>
