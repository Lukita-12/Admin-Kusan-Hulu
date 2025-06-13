<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Perubahan KK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
    </style>
</head>
<body class="bg-white text-black p-10">
    <!-- Download Button -->
    <div class="max-w-3xl mx-auto mb-4 text-right">
        <button onclick="downloadPDF()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Download PDF
        </button>
    </div>

    <!-- Surat -->
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
        <div class="mb-6 leading-relaxed text-justify">
            <p class="mb-4">
                Yang bertanda tangan di bawah ini Camat Kusan Hulu, Kabupaten Tanah Bumbu, menerangkan bahwa:
            </p>

<!-- Bagian Data Penduduk & Keluarga -->
<div class="grid grid-cols-2 gap-4 mb-6 text-sm">
    <div class="space-y-1">
        <p><strong>Nama Kepala Keluarga</strong>: {{ $pengajuanPerubahanKK->kepala_keluarga }}</p>
        <p><strong>NIK</strong>: {{ $pengajuanPerubahanKK->nik }}</p>
        <p><strong>No. KK</strong>: {{ $pengajuanPerubahanKK->no_kk }}</p>
        <p><strong>Alamat</strong>: {{ $pengajuanPerubahanKK->alamat }}</p>
        <p><strong>Kelurahan/Desa</strong>: {{ $pengajuanPerubahanKK->kelurahan_desa }}</p>
        <p><strong>Kecamatan</strong>: {{ $pengajuanPerubahanKK->kecamatan }}</p>
    </div>
    <div class="space-y-1">
        <p><strong>Kabupaten</strong>: {{ $pengajuanPerubahanKK->kabupaten }}</p>
        <p><strong>Provinsi</strong>: {{ $pengajuanPerubahanKK->provinsi }}</p>
        <p><strong>Kode Pos</strong>: {{ $pengajuanPerubahanKK->kode_pos }}</p>
        <p><strong>Tempat, Tanggal Lahir</strong>: {{ $pengajuanPerubahanKK->tempat_lahir }}, {{ \Carbon\Carbon::parse($pengajuanPerubahanKK->tanggal_lahir)->translatedFormat('d F Y') }}</p>
        <p><strong>Jenis Kelamin</strong>: {{ $pengajuanPerubahanKK->jenis_kelamin }}</p>
        <p><strong>Status Perkawinan</strong>: {{ $pengajuanPerubahanKK->status_perkawinan }}</p>
    </div>
</div>



            <p class="mb-4">
                Berdasarkan permohonan perubahan data pada Kartu Keluarga di atas, kepada pihak Kecamatan, proses lebih lanjut akan mengikuti ketentuan Disdukcapil Kabupaten Tanah Bumbu.
            </p>

            <p class="mb-2">
                Demikian surat ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- TTD -->
        <div class="text-right mt-12">
            <p>Kusan Hulu, {{ \Carbon\Carbon::parse($pengajuanPerubahanKK->tanggal)->translatedFormat('d F Y') }}</p>
            <p class="mt-6 font-bold uppercase">CAMAT KUSAN HULU</p>
            <p class="mt-16 underline">H. ABDUL JABAR, S.AP</p>
            <p>NIP. 19661120 198602 1033</p>
        </div>
    </div>

    <!-- Script PDF -->
    <script>
        function downloadPDF() {
            html2pdf()
              .set({ margin:0.5, filename:'surat_perubahan_kk.pdf', image:{ type:'jpeg', quality:0.98 },
                     html2canvas:{ scale:2 }, jsPDF:{ unit:'in', format:'a4', orientation:'portrait' } })
              .from(document.getElementById('surat'))
              .save();
        }
    </script>
</body>
</html>
