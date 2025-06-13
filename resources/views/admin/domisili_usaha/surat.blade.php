<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Domisili Usaha</title>
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

        <!-- Isi Surat -->
        <div class="mb-6 leading-relaxed">
            <p class="mb-4">Yang bertanda tangan di bawah ini, Camat Kusan Hulu, Kabupaten Tanah Bumbu, dengan ini menerangkan bahwa:</p>

            <ul class="space-y-1 mb-4">
                <li><strong>Nama</strong> : {{ $domisiliUsaha->dataPenduduk->nama }}</li>
                <li><strong>NIK</strong> : {{ $domisiliUsaha->dataPenduduk->nik }}</li>
                <li><strong>Tempat/Tanggal Lahir</strong> : {{ $domisiliUsaha->dataPenduduk->tempat_lahir }}, {{ \Carbon\Carbon::parse($domisiliUsaha->dataPenduduk->tanggal_lahir)->translatedFormat('d F Y') }}</li>
                <li><strong>Alamat</strong> : {{ $domisiliUsaha->dataPenduduk->alamat_lengkap }}</li>
            </ul>

            <p class="mb-4">Benar yang bersangkutan memiliki usaha dengan rincian sebagai berikut:</p>

            <ul class="space-y-1 mb-4">
                <li><strong>Nama Usaha</strong> : {{ $domisiliUsaha->nama_usaha }}</li>
                <li><strong>Jenis Usaha</strong> : {{ $domisiliUsaha->jenis_usaha }}</li>
                <li><strong>Alamat Usaha</strong> : {{ $domisiliUsaha->alamat_usaha }}</li>
            </ul>

            <p class="mb-4">
                Usaha tersebut berdomisili dan aktif beroperasi di wilayah Kecamatan Kusan Hulu, Kabupaten Tanah Bumbu, Kalimantan Selatan.
            </p>

            <p class="mb-2">Demikian surat ini dibuat untuk dapat digunakan sebagaimana mestinya.</p>
        </div>

        <!-- Tanda Tangan -->
        <div class="text-right mt-12">
            <p>Kusan Hulu, {{ \Carbon\Carbon::parse($domisiliUsaha->tanggal)->translatedFormat('d F Y') }}</p>
            <p class="mt-4 font-bold uppercase">CAMAT KUSAN HULU</p>
            <p class="mt-16 underline">H.ABDUL JABAR,S,AP</p>
            <p>NIP. 19661120 198602 1033</p>
        </div>
    </div>

    <!-- Script PDF -->
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
