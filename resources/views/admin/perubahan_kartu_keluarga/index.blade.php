<x-layout>

    <div>
        <a href="{{ route('admin.perubahan_kartu_keluarga.create') }}">+ Baru</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Tanggal</td>
                    <td>Deskripsi perubahan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($perubahanKartuKeluargas as $perubahanKartuKeluarga)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $perubahanKartuKeluarga->tanggal }}</td>
                        <td>{{ $perubahanKartuKeluarga->deskripsi_perubahan }}</td>
                        <td>
                            <a href="{{ route('admin.perubahan_kartu_keluarga.edit', $perubahanKartuKeluarga->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.perubahan_kartu_keluarga.destroy', $perubahanKartuKeluarga->id) }}">
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
        {{ $perubahanKartuKeluargas->links() }}
    </div>

</x-layout>