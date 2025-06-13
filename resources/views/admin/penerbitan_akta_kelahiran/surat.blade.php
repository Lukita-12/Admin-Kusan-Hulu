<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kelahiran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
    </style>
</head>
<body class="bg-white text-black p-10">

    <!-- Tombol Download -->
    <div class="max-w-3xl mx-auto mb-4 text-right">
        <button onclick="downloadPDF()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
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
            <h1 class="text-xl font-bold uppercase underline">Surat Keterangan Kelahiran</h1>
            <!-- <p class="text-sm">Nomor: {{ $penerbitanAktaKelahiran->nomor_surat ?? '...../...../.....' }}</p> -->
        </div>

        <!-- Isi Surat -->
        <div class="mb-6 leading-relaxed text-justify text-sm">
            <p class="mb-4">
                Yang bertanda tangan di bawah ini, Camat Kusan Hulu, Kabupaten Tanah Bumbu, dengan ini menerangkan bahwa telah lahir seorang anak dengan data sebagai berikut:
            </p>

            <ul class="mb-4">
                <li><strong>Nama</strong>: {{ $penerbitanAktaKelahiran->nama_anak }}</li>
                <li><strong>Jenis Kelamin</strong>: {{ $penerbitanAktaKelahiran->jenis_kelamin }}</li>
                <li><strong>Tempat, Tanggal Lahir</strong>: {{ $penerbitanAktaKelahiran->tempat_kelahiran }}, {{ \Carbon\Carbon::parse($penerbitanAktaKelahiran->tanggal_kelahiran)->translatedFormat('d F Y') }}</li>
                <li><strong>Anak ke</strong>: {{ $penerbitanAktaKelahiran->anak_ke }}</li>
            </ul>

            <p class="mb-2">Dengan identitas orang tua sebagai berikut:</p>
            <ul class="mb-4">
                <li><strong>Nama Ayah</strong>: {{ $penerbitanAktaKelahiran->nama_ayah }}</li>
                <li><strong>Nama Ibu</strong>: {{ $penerbitanAktaKelahiran->nama_ibu }}</li>
            </ul>

            <p>
                Surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya sebagai salah satu syarat penerbitan Akta Kelahiran di instansi yang berwenang.
            </p>
        </div>

        <!-- Tanda Tangan -->
        <div class="text-right mt-12">
            <p>Kusan Hulu, {{ \Carbon\Carbon::parse($penerbitanAktaKelahiran->tanggal)->translatedFormat('d F Y') }}</p>
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
                filename:     'surat_keterangan_kelahiran.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
