<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Domisili Penduduk</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <h1 class="text-2xl font-bold uppercase">Surat Keterangan Domisili Penduduk</h1>
            <p class="text-sm text-gray-600">Nomor: {{ '470/'.$domisiliPenduduk->id.'/SKD/'.date('Y') }}</p>
        </div>

        <!-- Isi Surat -->
        <div class="mb-6">
            <p class="mb-2">Yang bertanda tangan di bawah ini:</p>
            <ul class="space-y-2">
                <li><strong>Nama:</strong> {{ $domisiliPenduduk->nama_lurah }}</li>
                <li><strong>Jabatan:</strong> Lurah {{ $domisiliPenduduk->kelurahan }}</li>
            </ul>

            <p class="mt-6 mb-2">Dengan ini menerangkan bahwa:</p>
            <ul class="space-y-2">
                <li><strong>Nama:</strong> {{ $domisiliPenduduk->penduduk->nama }}</li>
                <li><strong>Tempat/Tanggal Lahir:</strong> {{ $domisiliPenduduk->penduduk->tempat_lahir }}, {{ \Carbon\Carbon::parse($domisiliPenduduk->tanggal_lahir)->translatedFormat('d F Y') }}</li>
                <li><strong>Jenis Kelamin:</strong> {{ ucfirst($domisiliPenduduk->penduduk->jenis_kelamin) }}</li>
                <li><strong>Pekerjaan:</strong> {{ $domisiliPenduduk->penduduk->pekerjaan }}</li>
                <li><strong>Alamat:</strong> {{ $domisiliPenduduk->penduduk->alamat }}</li>
            </ul>

            <p class="mt-6">
                Berdasarkan data yang ada di kantor kelurahan, benar bahwa orang tersebut di atas adalah penduduk yang berdomisili di alamat tersebut di wilayah Kelurahan {{ $domisiliPenduduk->kelurahan }}, Kecamatan {{ $domisiliPenduduk->kecamatan }}, Kota {{ $domisiliPenduduk->kota }}.
            </p>

            <p class="mt-4">
                Surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Tanda Tangan -->
        <div class="text-right mt-12">
            <p>{{ $domisiliPenduduk->kota }}, {{ \Carbon\Carbon::parse($domisiliPenduduk->tanggal_surat)->translatedFormat('d F Y') }}</p>
            <p class="mt-6 font-bold">Lurah {{ $domisiliPenduduk->kelurahan }}</p>
            <p class="mt-16 underline">{{ $domisiliPenduduk->nama_lurah }}</p>
        </div>
    </div>

    <!-- Script untuk download -->
    <script>
        function downloadPDF() {
            const element = document.getElementById("surat");
            const opt = {
                margin:       0.5,
                filename:     'surat_domisili_penduduk.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
