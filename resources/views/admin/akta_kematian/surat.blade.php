<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Domisili Usaha</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black p-10">
    <div class="max-w-3xl mx-auto border p-8 shadow-md rounded-xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold uppercase">Surat Keterangan Domisili Usaha</h1>
            <p class="text-sm text-gray-600">Nomor: {{ $domisiliUsaha->nomor_surat }}</p>
        </div>

        <!-- Isi Surat -->
        <div class="mb-6">
            <p class="mb-2">Yang bertanda tangan di bawah ini:</p>
            <ul class="space-y-2">
                <li><strong>Nama:</strong> {{ $domisiliUsaha->nama_lurah }}</li>
                <li><strong>Jabatan:</strong> Lurah {{ $domisiliUsaha->kelurahan }}</li>
            </ul>

            <p class="mt-6 mb-2">Dengan ini menerangkan bahwa:</p>
            <ul class="space-y-2">
                <li><strong>Nama:</strong> {{ $domisiliUsaha->penduduk->nama }}</li>
                <li><strong>Alamat:</strong> {{ $domisiliUsaha->penduduk->alamat_lengkap }}</li>
                <li><strong>Jenis Usaha:</strong> {{ $domisiliUsaha->jenis_usaha }}</li>
                <li><strong>Nama Usaha:</strong> {{ $domisiliUsaha->nama_usaha }}</li>
                <li><strong>Alamat Usaha:</strong> {{ $domisiliUsaha->alamat_usaha }}</li>
            </ul>

            <p class="mt-6">
                Benar yang bersangkutan berdomisili dan melakukan kegiatan usaha di wilayah {{ $domisiliUsaha->kelurahan }}, Kecamatan {{ $domisiliUsaha->kecamatan }}, Kota Banjarmasin.
            </p>

            <p class="mt-4">
                Surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Tanda Tangan -->
        <div class="text-right mt-12">
            <p>Banjarmasin, {{ \Carbon\Carbon::parse($domisiliUsaha->tanggal_surat)->translatedFormat('d F Y') }}</p>
            <p class="mt-6 font-bold">Lurah {{ $domisiliUsaha->kelurahan }}</p>
            <p class="mt-16 underline">{{ $domisiliUsaha->nama_lurah }}</p>
        </div>
    </div>
</body>
</html>
