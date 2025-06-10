<x-layout>
 
<nav class="bg-blue-600 p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        
        <!-- Logo dan Judul -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo_tanbu.png') }}"
                 alt="Logo"
                 class="h-10 w-auto object-contain">
            <h1 class="text-white text-xl font-semibold"> KECAMATAN KUSAN HULU </h1>
        </div>

        <!-- Navigasi Login & Register -->
        <div class="flex space-x-4 items-center">
            <a href="{{ route('login') }}"
               class="text-white border border-white px-4 py-1 rounded hover:bg-white hover:text-blue-600 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-yellow-400 text-white px-4 py-1 rounded hover:bg-white-500 transition">
                Register
            </a>
        </div>

    </div>
</nav>
        <!-- FORM UNGGAH FOTO -->
       <div class="relative w-full h-[400px] overflow-hidden">
    <!-- Gambar -->
    <img src="{{ asset('images/kantor kecamatan.jpeg') }}"
         alt="Background"
         class="w-full h-full object-cover">

    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black/60"></div>
    

    <!-- Teks -->
<div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
    <h1 class="text-4xl md:text-6xl lg:text-8xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 via-pink-500 to-yellow-500 drop-shadow-lg">
        SELAMAT DATANG DI WEBSITE KECAMATAN KUSAN HULU
    </h1>
</div>

</div>

<div class="container mx-auto p-4">
   <div class="container mx-auto p-4">
    <p class="text-lg font-extrabold mb-4 text-center">Pelayanan Administrasi Kependudukan:</p>
    <p class="text-lg font-extrabold mb-4 text-center">Silahkan Login atau Register terlebih dahulu!</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- DOMISILI USAHA -->
        <div class="flex items-center gap-4">
            <x-heroicon-s-building-office class="w-16 h-16 text-slate-700" />
            <div class="flex flex-col">
                <span class="font-semibold">DOMISILI USAHA</span>
            </div>
        </div>

        <!-- DOMISILI PENDUDUK -->
        <div class="flex items-center gap-4">
            <x-heroicon-s-user-group class="w-16 h-16 text-slate-700" />
            <div class="flex flex-col">
                <span class="font-semibold">DOMISILI PENDUDUK</span>
            </div>
        </div>

        <!-- PINDAH DOMISILI -->
        <div class="flex items-center gap-4">
            <x-heroicon-s-arrow-path class="w-16 h-16 text-slate-700" />
            <div class="flex flex-col">
                <span class="font-semibold">PINDAH DOMISILI</span>
            </div>
        </div>

        <!-- PERUBAHAN KK -->
        <div class="flex items-center gap-4">
            <x-heroicon-s-identification class="w-16 h-16 text-slate-700" />
            <div class="flex flex-col">
                <span class="font-semibold">PERUBAHAN KARTU KELUARGA</span>
            </div>
        </div>

        <!-- AKTA KELAHIRAN -->
        <div class="flex items-center gap-4">
            <x-heroicon-s-cake class="w-16 h-16 text-slate-700" />
            <div class="flex flex-col">
                <span class="font-semibold">AKTA KELAHIRAN</span>
            </div>
        </div>

        <!-- AKTA KEMATIAN -->
        <div class="flex items-center gap-4">
            <x-heroicon-s-exclamation-circle class="w-16 h-16 text-slate-700" />
            <div class="flex flex-col">
                <span class="font-semibold">AKTA KEMATIAN</span>
            </div>
        </div>
    </div>
</div>

</div>


    

   <!-- FOOTER -->
<footer class="bg-black text-white p-6 mt-auto">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 text-center md:text-left">
        
        <!-- Informasi Umum -->
        <div>
            <h3 class="text-lg font-semibold mb-2">KECAMATAN KUSAN HULU</h3>
            <p class="text-sm">
                Aplikasi ini dibuat untuk mendukung pelayanan administrasi digital Kecamatan Kusan Hulu,
                seperti pengajuan surat dan pendataan penduduk.
            </p>
        </div>

        <!-- Kontak -->
        <div>
            <h3 class="text-lg font-semibold mb-2">Kontak Kami</h3>
            <p class="text-sm">Alamat: Jl. Raya Kecamatan Kusan Hulu No.123</p>
            <p class="text-sm">Telepon: (0518) 123456</p>
            <p class="text-sm">Email: kec.kusanhulu@tanbu.go.id</p>
        </div>

    </div>
</footer>


</x-layout>