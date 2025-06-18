<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kematian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
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
            <p class="text-sm">Jl. Binawara - Kusan Hulu, Kabupaten Tanah Bumbu, Kalimantan Selatan, Kode Pos 72273</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="text-center mb-8">
        <h1 class="text-xl font-bold uppercase underline">Surat Keterangan Kematian</h1>
        <!-- <p class="text-sm">Nomor: {{ $akta->nomor_surat ?? '...../...../.....' }}</p> -->
    </div>

    <!-- Isi Surat -->
    <p class="mb-4">
        Yang bertanda tangan di bawah ini, Camat Kusan Hulu, Kabupaten Tanah Bumbu, dengan ini menerangkan bahwa:
    </p>

    <p class="mb-4">
        Berdasarkan laporan dari <strong>{{ $akta->dataPenduduk->nama }}</strong>, dengan NIK <strong>{{ $akta->dataPenduduk->nik }}</strong>, tempat tanggal lahir <strong>{{ $akta->dataPenduduk->tempat_lahir }}, {{ \Carbon\Carbon::parse($akta->dataPenduduk->tanggal_lahir)->translatedFormat('d F Y') }}</strong>, jenis kelamin <strong>{{ $akta->dataPenduduk->jenis_kelamin }}</strong>, dan beralamat di <strong>{{ $akta->dataPenduduk->alamat_lengkap }}</strong>, telah melaporkan bahwa:
    </p>

    <p class="mb-2">Telah meninggal dunia:</p>
    <ul class="mb-4">
        <li><strong>Nama</strong>: {{ $akta->nama_alm }}</li>
        <li><strong>Tempat, Tanggal Meninggal</strong>: {{ $akta->tempat_meninggal }}, {{ \Carbon\Carbon::parse($akta->tanggal_meninggal)->translatedFormat('d F Y') }}</li>
        <li><strong>Penyebab</strong>: {{ $akta->penyebab_meninggal }}</li>
    </ul>

    <p>
        Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
    </p>

    <!-- Tanda Tangan Dalam Surat -->
    <div class="text-right pt-16">
        <p>Kusan Hulu, {{ \Carbon\Carbon::parse($akta->tanggal)->translatedFormat('d F Y') }}</p>
        <p class="mt-6 font-bold uppercase">CAMAT KUSAN HULU</p>
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
                filename:     'surat_keterangan_kematian.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
