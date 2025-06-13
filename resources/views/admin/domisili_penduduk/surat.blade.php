<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Domisili Penduduk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body class="bg-white text-black p-10">

    <!-- Tombol Download -->
    <div class="max-w-3xl mx-auto mb-4 text-right">
        <button onclick="downloadPDF()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Download PDF
        </button>
    </div>

    <!-- Konten Surat -->
    <div id="surat" class="max-w-3xl mx-auto border p-8 shadow-md rounded-xl">
        <!-- Kop Surat -->
        <div class="flex items-center mb-8 border-b border-black pb-4">
            <img src="{{ asset('images/logo_tanbu.png') }}" class="w-20 h-20 object-contain">
            <div class="text-center w-full leading-tight -ml-20">
                <h2 class="text-lg font-bold uppercase">Pemerintah Kabupaten Tanah Bumbu</h2>
                <h1 class="text-xl font-bold uppercase">Kecamatan Kusan Hulu</h1>
                <p class="text-sm">Jl.Binawara - Kusan Hulu, Kabupaten Tanah Bumbu, Kalimantan Selatan Kode Pos 72273</p>
            </div>
        </div>

        <!-- Judul Surat -->
        <div class="text-center mb-6">
            <h1 class="text-xl font-bold uppercase underline">Surat Keterangan Domisili</h1>
            <!-- <p class="text-sm mt-1">Nomor: {{ '470/'.$domisiliPenduduk->id.'/SKD/'.date('Y') }}</p> -->
        </div>

        <!-- Isi Surat -->
        <div class="mb-6 leading-relaxed">
            <p class="mb-4">Yang bertanda tangan di bawah ini, Camat Kusan Hulu, Kabupaten Tanah Bumbu, dengan ini menerangkan bahwa:</p>

            <ul class="space-y-1 mb-4">
                <li><strong>Nama</strong> : {{ $domisiliPenduduk->dataPenduduk->nama }}</li>
                <li><strong>NIK</strong> : {{ $domisiliPenduduk->dataPenduduk->nik }}</li>
                <li><strong>Tempat/Tanggal Lahir</strong> : {{ $domisiliPenduduk->dataPenduduk->tempat_lahir }}, {{ \Carbon\Carbon::parse($domisiliPenduduk->dataPenduduk->tanggal_lahir)->translatedFormat('d F Y') }}</li>
                <li><strong>Jenis Kelamin</strong> : {{ ucfirst($domisiliPenduduk->dataPenduduk->jenis_kelamin) }}</li>
                <li><strong>Pekerjaan</strong> : {{ $domisiliPenduduk->dataPenduduk->pekerjaan }}</li>
                <li><strong>Alamat</strong> : {{ $domisiliPenduduk->dataPenduduk->alamat_lengkap }}</li>
            </ul>

            <p class="mb-4">
                Berdasarkan data yang ada di kantor Kecamatan Kusan Hulu, benar bahwa orang tersebut di atas adalah penduduk yang berdomisili di alamat tersebut di wilayah Kecamatan Kusan Hulu, Kabupaten Tanah Bumbu, Kalimantan Selatan.
            </p>

            <p class="mb-2">Surat ini dibuat untuk dapat digunakan sebagaimana mestinya.</p>
        </div>

        <!-- Tanda Tangan -->
        <div class="text-right mt-12">
            <p>Kusan Hulu, {{ \Carbon\Carbon::parse($domisiliPenduduk->tanggal)->translatedFormat('d F Y') }}</p>
            <p class="mt-4 font-bold uppercase">CAMAT KUSAN HULU</p>
            <p class="mt-16 underline">H. ABDUL JABAR, S.AP</p>
            <p>NIP. 19661120 198602 1033</p>
        </div>
    </div>

    <!-- Script PDF -->
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
