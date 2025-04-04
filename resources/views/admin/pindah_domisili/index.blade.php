<x-layout>

    <div>
        <a href="{{ route('admin.pindah_domisili.create') }}">+ Baru</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Tanggal</td>
                    <td>Alamat asal</td>
                    <td>Tujuan</td>
                    <td>Alasan pindah</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pindahDomisilis as $pindahDomisili)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pindahDomisili->tanggal }}</td>
                        <td>{{ $pindahDomisili->alamat_asal }}</td>
                        <td>{{ $pindahDomisili->tujuan }}</td>
                        <td>{{ $pindahDomisili->alasan_pindah }}</td>
                        <td>
                            <a href="{{ route('admin.pindah_domisili.edit', $pindahDomisili->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.pindah_domisili.destroy', $pindahDomisili->id) }}">
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
        {{ $pindahDomisilis->links() }}
    </div>

</x-layout>