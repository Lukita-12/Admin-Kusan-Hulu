<x-layout>

    <div>
        <a href="{{ route('admin.domisili_usaha.create') }}">+ Baru</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Tanggal</td>
                    <td>Nama usaha</td>
                    <td>Jenis usaha</td>
                    <td>Alamat usaha</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($domisiliUsahas as $domisiliUsaha)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $domisiliUsaha->tanggal }}</td>
                        <td>{{ $domisiliUsaha->nama_usaha }}</td>
                        <td>{{ $domisiliUsaha->jenis_usaha }}</td>
                        <td>{{ $domisiliUsaha->alamat_usaha }}</td>
                        <td>
                            <a href="{{ route('admin.domisili_usaha.edit', $domisiliUsaha->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.domisili_usaha.destroy', $domisiliUsaha->id) }}">
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
        {{ $domisiliUsahas->links() }}
    </div>

</x-layout>