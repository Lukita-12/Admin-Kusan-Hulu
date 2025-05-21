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
</div>

<section class="bg-white py-10 px-4 md:px-16">
    <div class="flex flex-col md:flex-row items-center gap-8">
        
        <!-- Gambar Kiri -->
        <div class="md:w-1/2 w-full">
            <img src="{{ asset('images/kantor kecamatan.jpeg') }}"
                 alt="Kantor Kecamatan"
                 class="w-full h-auto rounded shadow">
        </div>
        
        <!-- Tulisan Kanan -->
        <div class="md:w-1/2 w-full">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">
                Sekilas Informasi
            </h2>
            <p class="text-gray-700 leading-relaxed">
                Kecamatan Kusan Hulu adalah salah satu kecamatan di Kabupaten Tanah Bumbu
                yang memiliki berbagai layanan administrasi masyarakat. Aplikasi ini bertujuan
                untuk mempermudah pelayanan seperti pembuatan surat, pendataan warga,
                dan informasi umum secara online dan efisien.
            </p>
        </div>

    </div>
</section>
<section class="bg-white py-10 px-4 md:px-16">
    <div class="flex flex-col md:flex-row items-center gap-8">
        
        <!-- Gambar Kiri -->
        <div class="md:w-1/2 w-full">
            <img src="{{ asset('images/kantor kecamatan.jpeg') }}"
                 alt="Kantor Kecamatan"
                 class="w-full h-auto rounded shadow">
        </div>
        
        <!-- Tulisan Kanan -->
        <div class="md:w-1/2 w-full">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">
                Sekilas Informasi
            </h2>
            <p class="text-gray-700 leading-relaxed">
                Kecamatan Kusan Hulu adalah salah satu kecamatan di Kabupaten Tanah Bumbu
                yang memiliki berbagai layanan administrasi masyarakat. Aplikasi ini bertujuan
                untuk mempermudah pelayanan seperti pembuatan surat, pendataan warga,
                dan informasi umum secara online dan efisien.
            </p>
        </div>

    </div>
</section>
<section class="bg-white py-10 px-4 md:px-16">
    <div class="flex flex-col md:flex-row items-center gap-8">
        
        <!-- Gambar Kiri -->
        <div class="md:w-1/2 w-full">
            <img src="{{ asset('images/kantor kecamatan.jpeg') }}"
                 alt="Kantor Kecamatan"
                 class="w-full h-auto rounded shadow">
        </div>
        
        <!-- Tulisan Kanan -->
        <div class="md:w-1/2 w-full">
            <h2 class="text-2xl font-bold text-blue-700 mb-4 border-b pb-2">
                Sekilas Informasi
            </h2>
            <p class="text-gray-700 leading-relaxed">
                Kecamatan Kusan Hulu adalah salah satu kecamatan di Kabupaten Tanah Bumbu
                yang memiliki berbagai layanan administrasi masyarakat. Aplikasi ini bertujuan
                untuk mempermudah pelayanan seperti pembuatan surat, pendataan warga,
                dan informasi umum secara online dan efisien.
            </p>
        </div>

    </div>
</section>

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