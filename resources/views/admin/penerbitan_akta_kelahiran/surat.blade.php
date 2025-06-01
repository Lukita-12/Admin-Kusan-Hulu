<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat penerbitanAktaKelahiran Kelahiran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold uppercase">Surat Keterangan Kelahiran</h1>
            <p class="text-sm text-gray-600">Nomor: {{ $penerbitanAktaKelahiran->nomor_surat ?? '...../...../.....' }}</p>
        </div>

        <!-- Isi Surat -->
        <div class="mb-6">
            <p class="mb-2">Yang bertanda tangan di bawah ini menerangkan bahwa telah lahir seorang anak dengan data sebagai berikut:</p>
            <ul class="space-y-2">
                <li><strong>Nama:</strong> {{ $penerbitanAktaKelahiran->nama_anak }}</li>
                <li><strong>Jenis Kelamin:</strong> {{ $penerbitanAktaKelahiran->jenis_kelamin }}</li>
                <li><strong>Tempat, Tanggal Lahir:</strong> {{ $penerbitanAktaKelahiran->tempat_lahir }}, {{ \Carbon\Carbon::parse($penerbitanAktaKelahiran->tanggal_lahir)->translatedFormat('d F Y') }}</li>
                <li><strong>Anak ke:</strong> {{ $penerbitanAktaKelahiran->anak_ke }}</li>
            </ul>

            <p class="mt-6 mb-2">Dari orang tua:</p>
            <ul class="space-y-2">
                <li><strong>Nama Ayah:</strong> {{ $penerbitanAktaKelahiran->nama_ayah }}</li>
                <li><strong>Nama Ibu:</strong> {{ $penerbitanAktaKelahiran->nama_ibu }}</li>
            </ul>

            <p class="mt-6">
                Surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Tanda Tangan -->
        <div class="text-right mt-12">
            <p>Kusan Hulu, {{ \Carbon\Carbon::parse($penerbitanAktaKelahiran->tanggal_surat)->translatedFormat('d F Y') }}</p>
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
                filename:     'surat_penerbitanAktaKelahiran_kelahiran.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
