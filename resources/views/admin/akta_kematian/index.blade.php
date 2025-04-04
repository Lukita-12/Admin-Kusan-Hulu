<x-layout>

    <div>
        <a href="{{ route('admin.akta_kematian.create') }}">+ Baru</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Tanggal</td>
                    <td>Tanggal meninggal</td>
                    <td>Tempat meninggal</td>
                    <td>Penyebab meninggal</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($aktaKematians as $aktaKematian)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $aktaKematian->tanggal }}</td>
                        <td>{{ $aktaKematian->tanggal_meninggal }}</td>
                        <td>{{ $aktaKematian->tempat_meninggal }}</td>
                        <td>{{ $aktaKematian->penyebab_meninggal }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.akta_kematian.edit', $aktaKematian->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.akta_kematian.destroy', $aktaKematian->id) }}">
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
        {{ $aktaKematians->links() }}
    </div>

</x-layout>