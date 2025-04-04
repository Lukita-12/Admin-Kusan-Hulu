<x-layout>

    <div>
        <a href="{{ route('admin.penduduk.create') }}">+ Baru</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama</td>
                    <td>Jenis kelamin</td>
                    <td>Status perkawinan</td>
                    <td>Tempat tanggal lahir</td>
                    <td>Agama</td>
                    <td>Pendidikan terakhir</td>
                    <td>Pekerjaan</td>
                    <td>Alamat lengkap</td>
                    <td>Kedudukan dalam keluarga</td>
                    <td>Warga Negara</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($penduduks as $penduduk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penduduk->nama }}</td>
                        <td>{{ $penduduk->jenis_kelamin }}</td>
                        <td>{{ $penduduk->status_perkawinan }}</td>
                        <td>{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir }}</td>
                        <td>{{ $penduduk->agama }}</td>
                        <td>{{ $penduduk->pendidikan_terakhir }}</td>
                        <td>{{ $penduduk->pekerjaan }}</td>
                        <td>{{ $penduduk->alamat_lengkap }}</td>
                        <td>{{ $penduduk->kedudukan_dalam_keluarga }}</td>
                        <td>{{ $penduduk->warga_negara }}</td>
                        <td>
                            <a href="{{ route('admin.penduduk.edit', $penduduk->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.penduduk.destroy', $penduduk->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $penduduks->links() }}
    </div>

</x-layout>