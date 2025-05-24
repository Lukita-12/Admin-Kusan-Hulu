<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Domisili Usaha</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- html2pdf library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body class="bg-white text-black p-10">
    <!-- Tombol download -->
    <div class="max-w-3xl mx-auto mb-4 text-right">
        <button onclick="downloadPDF()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Download PDF
        </button>
    </div>

    <!-- Konten surat -->
    <div id="surat" class="max-w-3xl mx-auto border p-8 shadow-md rounded-xl">
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
                Benar bahwa yang bersangkutan berdomisili dan melakukan kegiatan usaha di wilayah {{ $domisiliUsaha->kelurahan }}, Kecamatan {{ $domisiliUsaha->kecamatan }}, Kota Banjarmasin.
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

    <!-- Script untuk download -->
    <script>
        function downloadPDF() {
            const element = document.getElementById("surat");
            const opt = {
                margin:       0.5,
                filename:     'surat_domisili_usaha.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
