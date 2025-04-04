<x-layout>

    <div>
        <a href="{{ route('admin.kartu_keluarga.create') }}">+ Baru</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>No. Kartu Keluarga</td>
                    <td>Kepala keluarga</td>
                    <td>Alamat</td>
                    <td>Kelurahan/Desa</td>
                    <td>Kecamatan</td>
                    <td>Kabupaten</td>
                    <td>Provinsi</td>
                    <td>Kode Pos</td>
                    <td>Tanggal penerbitan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($kartukeluargas as $kartukeluarga)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kartukeluarga->no_kk }}</td>
                        <td>{{ $kartukeluarga->kepala_keluarga }}</td>
                        <td>{{ $kartukeluarga->alamat }}</td>
                        <td>{{ $kartukeluarga->kelurahan_desa }}</td>
                        <td>{{ $kartukeluarga->kecamatan }}</td>
                        <td>{{ $kartukeluarga->kabupaten }}</td>
                        <td>{{ $kartukeluarga->provinsi }}</td>
                        <td>{{ $kartukeluarga->kode_pos }}</td>
                        <td>{{ $kartukeluarga->tanggal_penerbitan }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.kartu_keluarga.edit', $kartukeluarga->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.kartu_keluarga.destroy', $kartukeluarga->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $kartukeluargas->links() }}
    </div>

</x-layout>