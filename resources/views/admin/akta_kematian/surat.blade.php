<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Akta Kematian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body class="bg-white text-black p-10">

    <<!-- Tombol download -->
    <div class="max-w-3xl mx-auto mb-4 text-right">
        <button onclick="downloadPDF()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Download PDF
        </button>
    </div>

    <!-- Konten Surat -->
    <div id="surat" class="max-w-3xl mx-auto border p-8 shadow-md rounded-xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold uppercase">Surat Keterangan Kematian</h1>
            <p class="text-sm text-gray-600">Nomor: {{ $akta->nomor_surat ?? '...../...../.....' }}</p>
        </div>

        <!-- Isi Surat -->
        <div class="mb-6">
            <p class="mb-2">Yang bertanda tangan di bawah ini menerangkan bahwa:</p>
            <ul class="space-y-2">
                <li><strong>Nama:</strong> {{ $akta->dataPenduduk->nama }}</li>
                <li><strong>NIK:</strong> {{ $akta->dataPenduduk->nik }}</li>
                <li><strong>Tempat, Tanggal Lahir:</strong> {{ $akta->dataPenduduk->tempat_lahir }}, {{ \Carbon\Carbon::parse($akta->dataPenduduk->tanggal_lahir)->format('d-m-Y') }}</li>
                <li><strong>Jenis Kelamin:</strong> {{ $akta->dataPenduduk->jenis_kelamin }}</li>
                <li><strong>Alamat:</strong> {{ $akta->dataPenduduk->alamat_lengkap }}</li>
            </ul>

            <p class="mt-6 mb-2">Telah meninggal dunia pada:</p>
            <ul class="space-y-2">
                <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($akta->tanggal_meninggal)->translatedFormat('d F Y') }}</li>
                <li><strong>Tempat Meninggal:</strong> {{ $akta->tempat_meninggal }}</li>
                <li><strong>Penyebab:</strong> {{ $akta->penyebab_meninggal }}</li>
            </ul>

            <p class="mt-6">
                Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Tanda Tangan -->
        <div class="text-right mt-12">
            <p>Kusan Hulu, {{ \Carbon\Carbon::parse($akta->tanggal)->translatedFormat('d F Y') }}</p>
            <p class="mt-6 font-bold">Camat Kusan Hulu</p>
            <p class="mt-16 underline">....................................</p>
        </div>
    </div>

    <!-- Script PDF -->
    <script>
        function downloadPDF() {
            const element = document.getElementById("surat");
            const opt = {
                margin:       0.5,
                filename:     'surat_akta_kematian.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
