<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Akta Kematian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black p-10">
    <div class="max-w-3xl mx-auto border p-8 shadow-md rounded-xl">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold uppercase">Surat Akta Kematian</h1>
            <p class="text-sm text-gray-600">Nomor: {{ $akta->id }}/AKM/{{ \Carbon\Carbon::parse($akta->tanggal)->format('Y') }}</p>
        </div>

        <div class="mb-6">
            <p class="mb-2">Yang bertanda tangan di bawah ini menyatakan bahwa:</p>

            <ul class="space-y-2">
                <li><strong>Nama Penduduk:</strong> {{ $akta->penduduk->nama }}</li>
                <li><strong>Tanggal Meninggal:</strong> {{ $akta->tanggal_kematian }}</li>
                <li><strong>Tempat Meninggal:</strong> {{ $akta->tempat_meninggal }}</li>
                <li><strong>Penyebab Meninggal:</strong> {{ $akta->penyebab_meninggal }}</li>
            </ul>
        </div>

        <div class="text-right mt-12">
            <p>Banjarmasin, {{ \Carbon\Carbon::parse($akta->tanggal)->translatedFormat('d F Y') }}</p>
            <p class="mt-6 font-bold">Petugas Pencatatan Sipil</p>
            <p class="mt-16 underline">....................................</p>
        </div>
    </div>
</body>
</html>
