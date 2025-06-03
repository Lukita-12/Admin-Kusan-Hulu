<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Perubahan KK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold uppercase">Surat Keterangan Perubahan Kartu Keluarga</h1>
            <p class="text-sm text-gray-600">Nomor: {{ $pengajuanPerubahanKK->nomor_surat }}</p>
        </div>

        <!-- Isi Surat -->
        <div class="mb-6">
            <p class="mb-2">Yang bertanda tangan di bawah ini:</p>
            <ul class="space-y-2">
                <li><strong>Nama:</strong> {{ $pengajuanPerubahanKK->nama_lurah }}</li>
                <li><strong>Jabatan:</strong> Lurah {{ $pengajuanPerubahanKK->kelurahan }}</li>
            </ul>

            <p class="mt-6 mb-2">Dengan ini menerangkan bahwa:</p>
            <ul class="space-y-2">
                <li><strong>Nama Kepala Keluarga:</strong> {{ $pengajuanPerubahanKK->kartukeluarga->kepala_keluarga ??'-'}}</li>
                <li><strong>No. KK Lama:</strong> {{ $pengajuanPerubahanKK->kartukeluarga->no_kk ??'-'}}</li>
                <li><strong>Alamat:</strong> {{ $pengajuanPerubahanKK->kartukeluarga->alamat ??'-'}}</li>
            </ul>

            <p class="mt-6 mb-2">Telah mengajukan perubahan data Kartu Keluarga berupa:</p>
            <p class="mb-2 italic">{{ $pengajuanPerubahanKK->alasan_perubahan }}</p>

            <p class="mt-4">
                Surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Tanda Tangan -->
        <div class="text-right mt-12">
            <p>Banjarmasin, {{ \Carbon\Carbon::parse($pengajuanPerubahanKK->tanggal_surat)->translatedFormat('d F Y') }}</p>
            <p class="mt-6 font-bold">Lurah {{ $pengajuanPerubahanKK->kelurahan }}</p>
            <p class="mt-16 underline">{{ $pengajuanPerubahanKK->nama_lurah }}</p>
        </div>
    </div>

    <!-- Script PDF -->
    <script>
        function downloadPDF() {
            const element = document.getElementById("surat");
            const opt = {
                margin:       0.5,
                filename:     'surat_perubahan_kk.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
