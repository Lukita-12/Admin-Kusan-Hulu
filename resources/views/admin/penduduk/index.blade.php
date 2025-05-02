<x-layout>

    <x-table.container variant="main">
        <x-table.container variant="header">
            <x-table.container variant="search-create">
                <x-table.search type="text" placeholder="Cari..." />
                <x-table.button-link variant="create" href="{{ route('admin.penduduk.create') }}">+ Baru</x-table.button-link>
            </x-table.container>

            <x-table.filter>
                <option value="Terbaru">Terbaru</option>
                <option value="Terlama">Terlama</option>
            </x-table.filter>
        </x-table.container>

        <x-table.container variant="table">
            <x-table.table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.td variant="head">No.</x-table.td>
                        <x-table.td variant="head">Nama</x-table.td>
                        <x-table.td variant="head">Jenis kelamin</x-table.td>
                        <x-table.td variant="head">Status perkawinan</x-table.td>
                        <x-table.td variant="head">Tempat tanggal lahir</x-table.td>
                        <x-table.td variant="head">Agama</x-table.td>
                        <x-table.td variant="head">Pendidikan terakhir</x-table.td>
                        <x-table.td variant="head">Pekerjaan</x-table.td>
                        <x-table.td variant="head">Alamat lengkap</x-table.td>
                        <x-table.td variant="head">Kedudukan dalam keluarga</x-table.td>
                        <x-table.td variant="head">Warga Negara</x-table.td>
                        <x-table.td variant="head">Aksi</x-table.td>
                    </x-table.tr>
                </x-table.thead>
                <tbody>
                    @foreach ($penduduks as $penduduk)
                        <x-table.tr variant="body">
                            <x-table.td>{{ $loop->iteration }}</x-table.td>
                            <x-table.td>{{ $penduduk->nama }}</x-table.td>
                            <x-table.td>{{ $penduduk->jenis_kelamin }}</x-table.td>
                            <x-table.td>{{ $penduduk->status_perkawinan }}</x-table.td>
                            <x-table.td>{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir->format('d M Y') }}</x-table.td>
                            <x-table.td>{{ $penduduk->agama }}</x-table.td>
                            <x-table.td>{{ $penduduk->pendidikan_terakhir }}</x-table.td>
                            <x-table.td>{{ $penduduk->pekerjaan }}</x-table.td>
                            <x-table.td>{{ $penduduk->alamat_lengkap }}</x-table.td>
                            <x-table.td>{{ $penduduk->kedudukan_dalam_keluarga }}</x-table.td>
                            <x-table.td>{{ $penduduk->warga_negara }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.button-link variant="edit" href="{{ route('admin.penduduk.edit', $penduduk) }}">Edit</x-table.button-link>
                                    <x-table.form action="{{ route('admin.penduduk.destroy', $penduduk) }}">
                                        @method('DELETE')
                                        <x-table.button variant="delete" type="submit">Hapus</x-table.button>
                                    </x-table.form>
                                </x-table.container>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-table.container>

        <x-table.container variant="footer">
            {{ $penduduks->links() }}
        </x-table.container>
    </x-table.container>

</x-layout>