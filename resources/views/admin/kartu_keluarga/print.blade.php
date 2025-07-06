<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Penduduk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 20px;
        }

        .kop-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .kop-logo {
            width: 80px;
            height: auto;
        }

        .kop-text {
            flex: 1;
            text-align: center;
            margin-left: 20px;
        }

        .kop-text h1 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop-text h2 {
            margin: 0;
            font-size: 18px;
            font-weight: normal;
            text-transform: uppercase;
        }

        .kop-text p {
            margin: 2px 0;
            font-size: 14px;
        }

        .line {
            border-top: 3px solid #000;
            margin: 10px 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .ttd {
            width: 100%;
            margin-top: 50px;
            display: flex;
            justify-content: flex-end;
        }

        .ttd .content {
            text-align: center;
            width: 250px;
        }

        .ttd .content .nama {
            margin-top: 60px;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="kop-container">
        {{-- Logo Kop Surat --}}
        <img src="{{ public_path('images/logo_tanbu.png') }}" alt="Logo" class="kop-logo">
        <div class="kop-text">
            <h1>PEMERINTAH KABUPATEN TANAH BUMBU</h1>
            <h2>KECAMATAN KUSAN HULU</h2>
            <p>Jl. Binawara - Kusan Hulu, Kabupaten Tanah Bumbu,</p>
            <p>Kalimantan Selatan Kode Pos 72273</p>
        </div>
    </div>

    <div class="line"></div>

    <h2>Laporan Data Penduduk Pengajuan Perubahan Kartu Keluarga</h2>

    <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($startDate)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($endDate)->format('d-m-Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>No. Kartu Keluarga</th>
                <th>Kepala Keluarga</th>
                <th>Alamat</th>
                <th>Kelurahan/Desa</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Kode Pos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuanPerubahanKK as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $item->dataPenduduk->nama }}</td>
                <td>{{ $item->dataPenduduk->nik }}</td>
                <td>{{ $item->no_kk }}</td>
                <td>{{ $item->kepala_keluarga }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->kelurahan_desa }}</td>
                <td>{{ $item->kecamatan }}</td>
                <td>{{ $item->kabupaten }}</td>
                <td>{{ $item->provinsi }}</td>
                <td>{{ $item->kode_pos }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($pengajuanPerubahanKK->count() > 0)
    <div class="ttd">
        <div class="content">
            <p>Kusan Hulu, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p class="font-bold uppercase">CAMAT KUSAN HULU</p>
            <p class="nama">H. ABDUL JABAR, S.AP</p>
            <p>NIP. 19661120 198602 1033</p>
        </div>
    </div>
    @endif

</body>
</html>
