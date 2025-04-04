<x-layout>

    <div>
        <a href="{{ route('admin.desa.create') }}">+ Baru</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama desa</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($desas as $desa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $desa->nama_desa }}</td>
                        <td>
                            <a href="{{ route('admin.desa.edit', $desa->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.desa.destroy', $desa->id) }}">
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
        {{ $desas->links() }}
    </div>

</x-layout>